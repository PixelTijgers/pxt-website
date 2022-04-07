<?php

// Controller namespacing.
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

// Facades.

// Models.
use App\Models\Page;

// Traits

class SitemapController extends Controller
{
    /**
    * Traits
    *
    */

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return response()
               ->view('front.sitemap', [
                   'home' => $this->returnHomePage(),
               ])
               ->header('Content-Type', 'text/xml');
    }

    /**
    * Return a model of the home page.
    *
    * @return Model
    */
    protected function returnHomePage()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/')->firstOrFail();
    }
}
