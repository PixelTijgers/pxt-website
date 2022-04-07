<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // App ViewComposers
        view::composer('*', \App\Http\Viewcomposers\NameSpaceViewComposer::class);
        view::composer('front/layouts/*', \App\Http\Viewcomposers\NavigationMenuViewComposer::class);
        view::composer('front/modules/*', \App\Http\Viewcomposers\PageViewComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
