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

class FooterSeeder extends Seeder
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
                'page_title' => 'Disclaimer',
                'menu_title' => 'Disclaimer',
                'slug' => '/disclaimer',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Disclaimer',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Disclaimer',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/disclaimer',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Cookie Policy',
                'menu_title' => 'Cookie Policy',
                'slug' => '/cookie-policy',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Cookie Policy',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Cookie Policy',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/cookie-policy',
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
            $createPage->navigation_menus()->sync([4]);

        }
    }
}
