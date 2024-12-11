<?php

use App\Livewire\Pages\PostCommentsPage;
use App\Services\PostService;
use Illuminate\Support\Facades\Route;

// Route::get('test', function(PostService $postService) {
//     return $postService->getPostsBy(auth()->user())->count(); 
// });


Route::view('/', 'welcome');
Route::get('home', function () {
    return view('home');
});

Route::get('p/{post}', PostCommentsPage::class)->name('post.comments');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('@{user:id}', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    
Route::view('profile/edit', 'profile-edit')
    ->middleware(['auth'])
    ->name('profile.edit');

require __DIR__.'/auth.php';
