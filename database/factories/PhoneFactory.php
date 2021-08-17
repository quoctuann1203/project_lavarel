<?php

namespace Database\Factories;

use App\Models\Phone;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(50),
            'provider_id' => Provider::all()->random()->id,
            'price' => $this->faker->numberBetween(1000000, 20000000),
            'inventory_quantity' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
