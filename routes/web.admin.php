<?php

// Facades.
use Illuminate\Support\Facades\Route;

// Controllers.
use App\Http\Controllers\Admin\Modules\DashboardController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect the routes if the users accidentally go to a wrong url.
Route::redirect('/admin', '/admin/login');
Route::redirect('/login', '/admin/login');
Route::redirect('/login/admin', '/admin/login');

// Protect modules with middleware.
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function(){

    Route::get('/logout', function(){
        \Auth::logout();
        return \Redirect::to('login');
    });

    // Create the namespace for the admin.
    Route::group([
        'middleware' => ['auth:sanctum', 'verified', 'admin.permission'],
        'namespace' => 'Modules',
        'prefix' => 'modules'
    ], function(){

        // Init dashboard route(s).
        Route::get('dashboard', [DashboardController::class, 'index']);

        // Init page route(s).
        Route::post(
            'pages/updateSortable',
            'PageController@updateSortable');

        Route::resource(
            'pages',
            PageController::class,
            ['names' => 'page'])->except(['show']);

        // Init post & categories route(s).
        Route::group([
            'prefix' => 'posts'
        ], function(){

            // Init categories.
            Route::resource(
                'categories',
                CategoryController::class,
                ['names' => 'category']);
        });

        Route::resource(
            'posts',
            PostController::class,
            ['names' => 'post'])->except(['show']);

        // Init teams & players route(s).
        Route::group([
            'prefix' => 'teams'
        ], function(){

            // Init categories.
            Route::resource(
                'players',
                PlayerController::class,
                ['names' => 'player'])->except(['show']);

            Route::get(
                'players/export/',
                'PlayerController@export')->name('player.export');
        });

        Route::resource(
            'teams',
            TeamController::class,
            ['names' => 'team'])->except(['show']);

        // Init enterprise route(s).
        Route::resource(
            'enterprise',
            EnterpriseController::class,
            ['names' => 'enterprise'])->only(['edit', 'update']);

        // Init administrators route(s).
        Route::resource(
            'administrators',
            AdministratorController::class,
            ['names' => 'administrator'])->except(['show']);

        // Init social media route(s).
        Route::resource(
            'socials',
            SocialController::class,
            ['names' => 'social'])->except(['show']);

        Route::post(
            'socials/updateSortable',
            'SocialController@updateSortable');
    });

});
