<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// si je suis connecté
Route::middleware(['auth', 'verified'])->group(function () {
    // affichage de tous les posts
    Route::get('/timeline', [PostController::class, 'index'])->name('timeline');
    // poster un post
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.like');

    Route::delete('/posts/{post}/unlike', [LikeController::class, 'destroy'])->name('posts.unlike');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // afficher ses propres posts
    Route::get('/user', [PostController::class, 'userPosts'])->name('user.posts');
});

require __DIR__.'/auth.php';


