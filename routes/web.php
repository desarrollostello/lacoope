<?php

use App\Http\Controllers\PostController;
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



Route::middleware(['auth:sanctum', 'verified'])->get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth:sanctum', 'verified'])->get('nuevo', [PostController::class, 'create'])->name('post.create');
Route::middleware(['auth:sanctum', 'verified'])->post('nuevo', [PostController::class, 'store'])->name('post.store');

Route::middleware(['auth:sanctum', 'verified'])->get('editar/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::middleware(['auth:sanctum', 'verified'])->patch('editar/{post}', [PostController::class, 'update'])->name('post.update');



Route::middleware(['auth:sanctum', 'verified'])->get('/category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::middleware(['auth:sanctum', 'verified'])->get('/tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

//Route::middleware(['auth:sanctum', 'verified'])->get('post/nuevo', [PostTable::class, 'create'])->name('posts.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
