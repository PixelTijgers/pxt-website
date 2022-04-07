<?php

// Facades.
use Illuminate\Support\Facades\Route;

// Controllers.
// Common controllers.
use App\Http\Controllers\Front\SitemapController;

// Module controllers.
use App\Http\Controllers\Front\Modules\HomeController;
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

// Under development route.
Route::get('/under-development', [HomeController::class, 'underDevelopment'])->name('under-development');

// App route group.
Route::middleware(['underDevelopment'])->group(function() {

    // Home route.
    Route::get('/', [HomeController::class, 'index']);

    // Sitemap route.
    Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
});
