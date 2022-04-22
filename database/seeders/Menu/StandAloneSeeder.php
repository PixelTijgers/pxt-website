<?php

// Namespacing.
namespace Database\Seeders\Menu;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\Page;

// Enums
use App\Enums\PublishedState;

class StandAloneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'page_title' => 'Algemene voorwaarden',
                'menu_title' => 'Algemene voorwaarden',
                'slug' => '/algemene-voorwaarden',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Algemene voorwaarden',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Algemene voorwaarden',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/algemene-voorwaarden',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Privacy Policy',
                'menu_title' => 'Privacy Policy',
                'slug' => '/privacy-policy',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Privacy Policy',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Privacy Policy',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/privacy-policy',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
        ];

        foreach($pages as $page) {

            // Create page in the database.
            $createPage = Page::create([
                    'status' => PublishedState::Published,
                    'published_at' => now(),

                    'last_edited_administrator_id' => 1,
                    'last_edit_at' => now(),
                ] + $page);

            // Sync with the navigation menu.
            $createPage->navigation_menus()->sync([5]);

        }

    }

}
