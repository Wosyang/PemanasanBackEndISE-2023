<?php

use App\Http\Controllers\Api\ProvinsiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('provinsi', [ProvinsiController::class, 'provinsi']);
