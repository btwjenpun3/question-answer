<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email, $password;

    public function login()
    {
        $credential = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($credential)) {
            $user = auth()->user();        
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);            
            session()->regenerate();
            return redirect()->intended('/');
        } else {
            $this->dispatch('login-error', 'Email / Password salah!');
        }

    }

    public function render()
    {
        return view('livewire.login');
    }
}
