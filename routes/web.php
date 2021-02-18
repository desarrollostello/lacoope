<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\UsersTable;
use App\Http\Livewire\TagsTable;
use App\Http\Livewire\CategoriesTable;
use App\Http\Livewire\Permisos;
use App\Http\Livewire\PostTable;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', UsersTable::class)->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/categories', CategoriesTable::class)->name('categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/tags', TagsTable::class)->name('tags');
Route::middleware(['auth', 'verified'])->get('/roles', Permisos::class)->name('roles');

Route::middleware(['auth:sanctum', 'verified'])->get('/posts', PostTable::class)->name('posts');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
