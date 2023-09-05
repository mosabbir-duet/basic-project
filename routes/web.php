<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Workbench\App\Models\User as ModelsUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function () {
    echo "This is a Blog page";
});

Route::get('/about', [AboutController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

// category Controller 

Route::get('category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('category/add', [CategoryController::class, 'AddCat'])->name('store.category');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});
