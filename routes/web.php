<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index']); // index.blade.php
Route::get('/post/{id}',[BlogController::class, 'showPost']);

//Route::get('/login', [BlogController::class, 'login']);//login.blade.php

Route::get('/contato', [BlogController::class, 'contact']);//contact.blade.php

Route::post('/saving',[BlogController::class, 'storePost']);

Route::get('/create_post', [BlogController::class, 'createPost']); //admin/create.blade.php

Route::get('/administration', [BlogController::class, 'admin']);//admin/admin.blade.php

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
