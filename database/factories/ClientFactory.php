<?php

// Factory namepacing.
namespace Database\Factories;

// Facades.
use Illuminate\Database\Eloquent\Factories\Factory;

// Models
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->company(),
            'contact'   => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'street'    => $this->faker->streetName(),
            'zip_code'  => $this->faker->postcode(),
            'location'  => $this->faker->city(),
            'country'   => \Arr::random(['Nederland', 'België']),
            'email'     => $this->faker->email(),
            'phone'     => $this->faker->phoneNumber(),
            'mobile'    => $this->faker->phoneNumber(),
            'coc'       => random_int(10000000, 99999999),
            'vat'       => $this->faker->vat(),
        ];
    }
}
