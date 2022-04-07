<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\Administrator;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrators = [
            [
                'name' => 'Michiel Elshout',
                'email' => 'info@pixeltijgers.nl',
                'password' => \Hash::make('PXTmichiel2019!'),
            ],
        ];

        foreach($administrators as $administrator) {
            $crAdministrator = Administrator::create($administrator);

            // Add avatar to database.
            $crAdministrator->addMediaFromBase64(\Avatar::create($crAdministrator['name'])->toBase64())
                ->toMediaCollection('avatar');
        }
    }
}
