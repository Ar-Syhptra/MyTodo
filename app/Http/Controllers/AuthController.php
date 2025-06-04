<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'Login Page',
        ]);
    }

    public function authLogin(Request $request): RedirectResponse
    {
        $request->only(['email', 'password']);

        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            toast('Login Berhasil!', 'success');
            return redirect()->intended('todo');
        }

        toast('Login gagal!', 'error');

        return back();
    }

    public function register()
    {
        return view('register', [
            'title' => 'Register Page',
        ]);
    }

    public function authRegister(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        User::factory()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        toast('Registrasi Berhasil!', 'success');
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}