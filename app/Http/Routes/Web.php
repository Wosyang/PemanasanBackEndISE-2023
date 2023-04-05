<?php

use App\Http\Controllers\Web\Pages\LoginPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginPage::class, 'render']);
