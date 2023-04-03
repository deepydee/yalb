<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserForgot;
use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserReset;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(UserRegister $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            // session()->flash('success', 'Регистрация пройдена');
        event(new Registered($user));
        auth('web')->login($user);

        return redirect()->route('verification.notice');
        }

    }

    public function login(UserLogin $request)
    {
        if (auth('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы успешно вошли');

            if (auth('web')->user()->is_admin) {
                return redirect()->route('admin.index');
            }

            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Неверный логин или пароль');
        // return redirect()->back()->withErrors(['email'=> 'Неверный логин или пароль']);
    }

    public function forgot(UserForgot $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status), 'message' => 'Ссылка для сброса пароля отправлена на указанный Вами email'])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function reset(UserReset $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function showEmailVerificationForm()
    {
        return view(
            'auth.verify-email',
            ['message' => 'На Ваш email была выслана ссылка для подтверждения!']
        );
    }

    public function verifyEmail(Request $request)
    {
        $request->user()
                ->sendEmailVerificationNotification();

        return back()
            ->with('message', 'На Ваш email была выслана ссылка для подтверждения!');
    }

    public function processEmailVerification(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home');
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect()->route('login');
    }
}
