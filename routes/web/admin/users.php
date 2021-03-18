<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/admin/users', [UserController::class, 'index'])->name('allUsers');
