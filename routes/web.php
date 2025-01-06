<?php

use App\Models\Channel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

require __DIR__.'/auth.php';

Route::redirect('/', 'general');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('/{channel:name}', 'pages.workspace')
    ->middleware('auth')
    ->name('workspace');

Route::delete('reset', function () {
    Artisan::call('migrate:fresh --force --seed');

    return redirect()->route('workspace', Channel::first());
})->middleware('auth')->name('reset');
