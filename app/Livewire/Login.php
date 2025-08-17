<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Login extends Component
{
    #[rule('required|email')]
    public $email = '';

    #[rule('required')]
    public $password = '';

    public function authenticate()
    {
        $data = $this->validate();
        if (Auth::attempt($data)) {
            session()->regenerate();
            Alert::toast('Login Berhasil!', 'success');
            return redirect()->intended('todo');
        }
        $this->dispatch('alert', ['type' => 'error', 'message' => 'Login gagal, Email Atau Password Salah!']);
        $this->reset('password');
    }

    #[Title('Login Page')]
    public function render()
    {
        return view('livewire.login');
    }
}
