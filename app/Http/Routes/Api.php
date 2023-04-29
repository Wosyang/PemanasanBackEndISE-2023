<?php

use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\DesaController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\FakultasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('provinsi', [ProvinsiController::class, 'provinsi']);
Route::get('desa', [DesaController::class, 'desa']);
Route::get('kecamatan', [KecamatanController::class, 'kecamatan']);
Route::get('fakultas', [FakultasController::class, 'fakultas']);

