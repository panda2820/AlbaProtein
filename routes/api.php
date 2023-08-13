<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


Route::post('send-mail', [AuthController::class, 'sendMail']);

Route::get('user/info/{phone_number}', [UserController::class, 'getInfo']);