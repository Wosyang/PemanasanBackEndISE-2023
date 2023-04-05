<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class LoginForm extends Component
{
    public $email, $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('dashboard');
        }

        $this->addError('email', 'Email or password is incorrect');
    }

    public function render()
    {
        return view('livewire.components.login-form');
    }
}
