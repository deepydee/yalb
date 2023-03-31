<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // session()->flash('success', 'Регистрация пройдена');
        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы успешно вошли');

            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            }

            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Неверный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.create');
    }
}
