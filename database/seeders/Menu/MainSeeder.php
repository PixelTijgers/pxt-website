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

class MainSeeder extends Seeder
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
                'page_title' => 'Home',
                'menu_title' => 'Home',
                'slug' => '/',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Home',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Home',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Expertises',
                'menu_title' => 'Expertises',
                'slug' => '/expertises',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Expertises',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Expertises',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/expertises',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',

                'children' => [
                    [
                        'page_title' => 'Ontwikkeling',
                        'menu_title' => 'Ontwikkeling',
                        'slug' => '/expertises/ontwikkeling',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Ontwikkeling',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Ontwikkeling',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/expertises/ontwikkeling',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),

                        'children' => [
                            [
                                'page_title' => 'Webdesign',
                                'menu_title' => 'Webdesign',
                                'slug' => '/expertises/ontwikkeling/webdesign',
                                'content' => '<p>Dit is een stuk tekst.</p>',

                                'meta_title' => 'Webdesign',
                                'meta_description' => 'Dit is een stuk tekst.',
                                'meta_tags' => 'Website, Webdesign, Design',

                                'og_title' => 'Webdesign',
                                'og_description' => 'Dit is een stuk tekst.',
                                'og_slug' => '/expertises/ontwikkeling/webdesign',
                                'og_type' => 'website',
                                'og_locale' => 'nl_NL',

                                'status' => PublishedState::Published,
                                'published_at' => now(),

                                'last_edited_administrator_id' => 1,
                                'last_edit_at' => now(),
                            ],
                            [
                                'page_title' => 'Webdevelopment',
                                'menu_title' => 'Webdevelopment',
                                'slug' => '/expertises/ontwikkeling/webdevelopment',
                                'content' => '<p>Dit is een stuk tekst.</p>',

                                'meta_title' => 'Webdevelopment',
                                'meta_description' => 'Dit is een stuk tekst.',
                                'meta_tags' => 'Website, Webdesign, Design',

                                'og_title' => 'Webdevelopment',
                                'og_description' => 'Dit is een stuk tekst.',
                                'og_slug' => '/expertises/ontwikkeling/webdevelopment',
                                'og_type' => 'website',
                                'og_locale' => 'nl_NL',

                                'status' => PublishedState::Published,
                                'published_at' => now(),

                                'last_edited_administrator_id' => 1,
                                'last_edit_at' => now(),
                            ]
                        ],
                    ],
                    [
                        'page_title' => 'Huisstijl',
                        'menu_title' => 'Huisstijl',
                        'slug' => '/expertises/huisstijl',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Huisstijl',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Huisstijl',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/expertises/huisstijl',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                    [
                        'page_title' => 'Beveiliging',
                        'menu_title' => 'Beveiliging',
                        'slug' => '/expertises/beveiliging',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Beveiliging',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Beveiliging',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/expertises/beveiliging',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                ]
            ],
            [
                'page_title' => 'Berichten',
                'menu_title' => 'Berichten',
                'slug' => '/berichten',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Berichten',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Berichten',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/berichten',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',

                'children' => [
                    [
                        'page_title' => 'Nieuws',
                        'menu_title' => 'Nieuws',
                        'slug' => '/berichten/nieuws',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Nieuws',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Nieuws',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/berichten/nieuws',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                    [
                        'page_title' => 'Blog',
                        'menu_title' => 'Blog',
                        'slug' => '/berichten/blog',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Blog',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Blog',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/berichten/blog',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                    [
                        'page_title' => 'Artikelen',
                        'menu_title' => 'Artikelen',
                        'slug' => '/berichten/artikelen',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Artikelen',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Artikelen',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/berichten/artikelen',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                ]
            ],
            [
                'page_title' => 'About',
                'menu_title' => 'About',
                'slug' => '/about',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'About',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'About',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/about',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Contact',
                'menu_title' => 'Contact',
                'slug' => '/contact',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Contact',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Contact',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/contact',
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
            $createPage->navigation_menus()->sync([2]);

        }
    }
}
