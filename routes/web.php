<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/journalists', function () {
    return view('author');
})->name('author');

Route::get('/post', function () {
    return view('post');
});

Auth::routes();


Route::get('/home/blogs/create', function () {
    $posts = DB::table('blogs')->get();
    return view('blog.create',compact('posts'));
})->name('blog.create');

Route::post('/home/blogs/create', function (Request $request) {
    DB::table('blogs')->insert([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $request->image->store('/images')
    ]);
    return back();
})->name('blog.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
