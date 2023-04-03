<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use App\Http\Requests\UserRegister;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

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

    public function logout()
    {
        auth('web')->logout();

        return redirect()->route('login');
    }
}
