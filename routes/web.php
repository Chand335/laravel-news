<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use AshAllenDesign\ShortURL\Classes\Builder;
Route::get('/', function () {
  // $shortURL = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->first();
  // dd($shortURL->visits->toArray()[0]);
  // $shortURLObject = app(Builder::class)
  // ->destinationUrl('https://laravel-news.com/category/packages')
  // ->trackVisits()
  // ->trackIPAddress()
  // ->trackBrowser()
  // ->trackBrowserVersion()
  // ->trackOperatingSystemVersion()
  // ->trackDeviceType()
  // ->trackRefererURL()
  // ->make();
  // echo "<a href='$shortURLObject->default_short_url'>'$shortURLObject->default_short_url'</a>";
  // dd($shortURLObject->default_short_url);
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
