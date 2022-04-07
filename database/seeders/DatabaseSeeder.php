<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Administrator seeders.
            AdministratorSeeder::class,
            AdministratorPermissionsSeeder::class,

            // Navigation seeders.
            NavigationMenuSeeder::class,
            Menu\MainSeeder::class,

            // Social media seeder.
            SocialMediaSeeder::class,
            SocialSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
