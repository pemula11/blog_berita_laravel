<?php

// use App\Models\post;
// use App\Models\User;

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;


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
    return view('home',  [
        "title" => "home",
        "active" => 'home',
        
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "andri Aditya",
        "email" => "andri@mail.com",
        "img" => "chat.png",
    ]);
});



Route::get('/blog', [PostController::class, 'index']);

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Category',
        "active" => 'categories',
        'categories' => Category::all(),
    ]);
});

// kode Latihan

// Route::get('/categories/{category:slug}', function(Category $category) {
//     return view('post', [
//         'title' => "Post by Category : $category->name",
//         "active" => 'categories',
//         'posts' => $category->post->load('category', 'author'),
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('post', [
//         'title' => "Post By author : $author->name",
//         "active" => 'categories',
//         'posts' => $author->post->load('category', 'author'),
//     ]);

// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', function(){
    return view('dashboard.index');
}
    )->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);   
 

Route::resource('/dashboard/posts', DashboardPostController::class)
    ->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')
    ->middleware('isadmin');