<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;

class LoginPage extends Controller
{
    public function render()
    {
        return view('pages.login-page');
    }
}
