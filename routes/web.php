<?php

use App\Http\Controllers\PostController;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\FrontrrhhController;

use App\Http\Controllers\PopupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\UsersTable;
use App\Http\Livewire\TagsTable;
use App\Http\Livewire\CategoriesTable;
use App\Http\Livewire\SubscripcionTable;
use App\Http\Livewire\Permisos;
use App\Http\Livewire\PostTable;
use App\Http\Livewire\PopupTable;
use App\Http\Livewire\RrhhTable;
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
Route::get('/', [InicioController::class, 'index'])->name('home');
Route::get('/novedades', [InicioController::class, 'novedades'])->name('novedades');
Route::post('/formContactoFrontend', [InicioController::class, 'formContactoFrontend'])->name('formFront');

Route::get('/paginarrhh', [FrontrrhhController::class, 'indexFront'])->name('paginarrhh');
Route::middleware(['auth:sanctum', 'verified'])->get('/curriculum', RrhhTable::class)->name('curriculum');
//Route::post('rrhh-email', [FrontrrhhController::class, 'store'])->name('rrhh.store');
/*
Route::get('/', function () {
    return view('welcome');
})->name('home');
*/
Route::get('/institucional', function () {
    return view('front/institucional');
})->name('institucional');

Route::get('/servicios', function () {
    return view('front/servicios');
})->name('servicios');

/*
Route::get('/novedades', function () {
    return view('front/novedades');
})->name('novedades');
*/

/*
Route::get('/rrhh', function () {
    return view('front/rrhh');
})->name('rrhh');
*/
Route::get('/contacto', function () {
    return view('front/contacto');
})->name('contacto');

Route::resource('ckeditor', CkeditorController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/users', UsersTable::class)->name('users');
Route::middleware(['auth:sanctum', 'verified'])->get('/categories', CategoriesTable::class)->name('categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/tags', TagsTable::class)->name('tags');
Route::middleware(['auth:sanctum', 'verified'])->get('/subscripciones', SubscripcionTable::class)->name('subscripciones');

Route::middleware(['auth', 'verified'])->get('/roles', Permisos::class)->name('roles');

//ckeditor upload
Route::post('posts/image_upload', [PostController::class, 'upload'])->name('upload');


//RRHH Curriculum
Route::middleware(['auth:sanctum', 'verified'])->get('crearcurriculum', [FrontrrhhController::class, 'create'])->name('rrhh.add');
Route::middleware(['auth:sanctum', 'verified'])->post('guardarcurriculum', [FrontrrhhController::class, 'store'])->name('rrhh.store');
Route::middleware(['auth:sanctum', 'verified'])->post('subirrcurriculum', [FrontrrhhController::class, 'storeFront'])->name('rrhh.storeFront');
Route::middleware(['auth:sanctum', 'verified'])->get('editarcurriculum/{curriculum}', [FrontrrhhController::class, 'edit'])->name('rrhh.edit');
Route::middleware(['auth:sanctum', 'verified'])->get('/vercurriculum/{curriculum}', [FrontrrhhController::class, 'show'])->name('rrhh.ver');
Route::middleware(['auth:sanctum', 'verified'])->patch('editarcurriculum/{curriculum}', [FrontrrhhController::class, 'update'])->name('rrhh.update');
Route::middleware(['auth:sanctum', 'verified'])->get('destroy/{curriculum}', [FrontrrhhController::class, 'destroy'])->name('rrhh.destroy');

// Posts
Route::middleware(['auth:sanctum', 'verified'])->get('crearpost', [PostController::class, 'create'])->name('post.addpost');
Route::middleware(['auth:sanctum', 'verified'])->get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/verpost/{post}', [PostController::class, 'show'])->name('post.ver');
Route::middleware(['auth:sanctum', 'verified'])->post('guardarpost', [PostController::class, 'store'])->name('post.store');
Route::middleware(['auth:sanctum', 'verified'])->get('editarpost/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::middleware(['auth:sanctum', 'verified'])->patch('editarpost/{post}', [PostController::class, 'update'])->name('post.update');
Route::middleware(['auth:sanctum', 'verified'])->get('destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');


// Curriculum Livewire
Route::middleware(['auth:sanctum', 'verified'])->get('/curriculum', RrhhTable::class)->name('curriculum');

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
