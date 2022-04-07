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

// Change the language of the admin.
Route::get('/admin/change-language/{language}', ['as' => 'change.language', 'uses' => 'App\Http\Controllers\Admin\AdminController@changeAdminLanguage']);

// Logout route.
Route::get('/admin/logout', function(){
    \Auth::logout();
    return \Redirect::to('login');
});

// Protect modules with middleware.
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function(){





    // Create the namespace for the admin.
    Route::group([
        'middleware' => ['auth:sanctum', 'verified', 'admin.permission'],
        'namespace' => 'Modules',
        'prefix' => 'modules'
    ], function(){

        // Init dashboard route(s).
        Route::get('dashboard', [DashboardController::class, 'index']);

    });

});
