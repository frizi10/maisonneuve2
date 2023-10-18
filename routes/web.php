<?php
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DocsZippController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/posts', 'BlogPostController@index');

//Route::get('/blog', [BlogPostController::class, 'index']);

Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');
Route::get('/blog-create', [BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog-create',[BlogPostController::class, 'store']);
Route::get('/blog-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('blog.edit');
Route::put('/blog-edit/{blogPost}', [BlogPostController::class, 'update']);
Route::delete('/blog-delete/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.delete');
Route::get('/query',[BlogPostController::class, 'query']);
Route::get('/page',[BlogPostController::class, 'page']);

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


Route::get('/', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/edit-student/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/edit-student/{etudiant}', [EtudiantController::class, 'update'])->middleware('auth');
Route::get('/show-student/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');

Route::get('/student-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/student-create', [EtudiantController::class, 'store']);
Route::delete('/student-delete/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');


Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('/registration', [CustomAuthController::class, 'store']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentification']);
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');


Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


Route::get('/documents', [DocsZippController::class, 'index'])->name('docs')->middleware('auth');
Route::get('/edit-docs/{doc}', [DocsZippController::class, 'edit'])->name('docs.edit');
Route::put('/edit-docs/{doc}', [BlogPostController::class, 'update']);

Route::delete('/docs-delete/{doc}', [DocsZippController::class, 'destroy'])->name('docs.delete');