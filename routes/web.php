<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PopupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\UsersTable;
use App\Http\Livewire\TagsTable;
use App\Http\Livewire\CategoriesTable;
use App\Http\Livewire\Permisos;
use App\Http\Livewire\PostTable;
use App\Http\Livewire\PopupTable;
use App\Http\Controllers\CkeditorController;

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

Route::get('/institucional', function () {
    return view('front/institucional');
})->name('institucional');

Route::get('/servicios', function () {
    return view('front/servicios');
})->name('servicios');


Route::get('/novedades', function () {
    return view('front/novedades');
})->name('novedades');


Route::get('/rrhh', function () {
    return view('front/rrhh');
})->name('rrhh');

Route::get('/contacto', function () {
    return view('front/contacto');
})->name('contacto');

Route::resource('ckeditor', CkeditorController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/users', UsersTable::class)->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/categories', CategoriesTable::class)->name('categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/tags', TagsTable::class)->name('tags');

Route::middleware(['auth', 'verified'])->get('/roles', Permisos::class)->name('roles');






//ckeditor upload
Route::post('posts/image_upload', [PostController::class, 'upload'])->name('upload');

// Posts
Route::middleware(['auth:sanctum', 'verified'])->get('crearpost', [PostController::class, 'create'])->name('post.addpost');


Route::middleware(['auth:sanctum', 'verified'])->get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/verpost/{post}', [PostController::class, 'show'])->name('post.ver');


Route::middleware(['auth:sanctum', 'verified'])->post('guardarpost', [PostController::class, 'store'])->name('post.store');
Route::middleware(['auth:sanctum', 'verified'])->get('editar/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::middleware(['auth:sanctum', 'verified'])->patch('editar/{post}', [PostController::class, 'update'])->name('post.update');
Route::middleware(['auth:sanctum', 'verified'])->get('destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');


// Post Livewire
Route::middleware(['auth:sanctum', 'verified'])->get('/posts2', PostTable::class)->name('posts2');

// Categorias and Tags
Route::middleware(['auth:sanctum', 'verified'])->get('/category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::middleware(['auth:sanctum', 'verified'])->get('/tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');




//Popup
Route::middleware(['auth:sanctum', 'verified'])->get('/popups2', PopupTable::class)->name('popups2');
Route::middleware(['auth:sanctum', 'verified'])->get('/popups', [PopupController::class, 'index'])->name('popup.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/popups/{popup}', [PopupController::class, 'show'])->name('popup.show');
Route::middleware(['auth:sanctum', 'verified'])->get('crearpopup', [PopupController::class, 'create'])->name('popup.create');
Route::middleware(['auth:sanctum', 'verified'])->post('nuevopopup', [PopupController::class, 'store'])->name('popup.store');
Route::middleware(['auth:sanctum', 'verified'])->get('editarpopup/{popup}', [PopupController::class, 'edit'])->name('popup.edit');
Route::middleware(['auth:sanctum', 'verified'])->patch('editarpopup/{popup}', [PopupController::class, 'update'])->name('popup.update');
Route::middleware(['auth:sanctum', 'verified'])->get('destroypopup/{popup}', [PopupController::class, 'destroy'])->name('popup.destroy');




//Route::middleware(['auth:sanctum', 'verified'])->get('post/nuevo', [PostTable::class, 'create'])->name('posts.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
