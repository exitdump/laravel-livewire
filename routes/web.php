<?php

use App\Services\PostService;
use Illuminate\Support\Facades\Route;

Route::get('test', function(PostService $postService) {
    return $postService->getPostsBy(auth()->user())->count(); 
});


Route::view('/', 'welcome');
Route::get('home', function () {
    return view('home');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
