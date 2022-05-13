<?php

// Factory namepacing.
namespace Database\Factories;

// Facades.
use Illuminate\Database\Eloquent\Factories\Factory;

// Models
use App\Models\Invoice;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => '2021' . random_int(1000, 9999),
            'client_id' => random_int(1, 50),
            'type' => \Arr::random(['invoice','quotation']),
            'invoice_date' => $this->faker->dateTimeBetween('-3 weeks', '+2 days'),
            'is_payed' => \Arr::random([0,1]),
        ];
    }
}
