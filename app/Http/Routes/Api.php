<?php

use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\DesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('provinsi', [ProvinsiController::class, 'provinsi']);
Route::get('desa', [DesaController::class, 'desa']);