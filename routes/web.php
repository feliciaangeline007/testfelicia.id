<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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
    return redirect()->route('posts.index');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/csrf-demo', function () {
        return view('security.csrf-demo');
    })->name('csrf-demo.create');

    Route::post('/csrf-demo', function () {
        Post::create(request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]));

        return redirect()->route('posts.index');
    })->name('csrf-demo.store');
});

Route::get('/vulnerable', function () {
    $name = request('name');
    $user = DB::select("SELECT * FROM users WHERE name = '$name'");

    return $user;
});

Route::get('/safe', function () {
    $name = request('name');
    $user = DB::select('SELECT * FROM users WHERE name = ?', [$name]);

    return $user;
});
