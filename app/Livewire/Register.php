<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use App\Models\User;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class Register extends Component
{
    #[rule('required|string|max:255')]
    public $name = '';

    #[rule('required|email|unique:users')]
    public $email = '';

    #[rule('required')]
    public $password = '';

    public function register()
    {
        try {
            $this->validate();

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);

            Alert::toast('Registrasi berhasil!', 'success');
            return redirect()->route('login');

        } catch (\Exception) {
            Alert::toast('Registrasi gagal!', 'Server error');
        }    }

    #[Title('Register Page')]
    public function render()
    {
        return view('livewire.register');
    }
}
