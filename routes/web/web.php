<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('index', [PostController::class, 'index'])->name('home.index');
Route::get('display/{post}', [PostController::class, 'show'])->name('showPost');
Route::get('/', [PostController::class, 'index'])->name('front');


// Creates 5 users each having 2 posts. 
//The author name fields in Post are populated with the User names 

Route::get('createUsers', function () {
    User::factory()->count(5)->hasPosts(2, function (array $attributes, User $user) {
        return ['author_first_name' => $user->first_name, 'author_last_name' => $user->last_name];
    })->create();
});


Route::get('currentPost', function () {
    return view('current_post');
});
