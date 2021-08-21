<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $config = Config::get('my_config')['order'];
        $statuses = array_flip($config['status']);
        $shipping = $config['shipping_method'];
        $payment = $config['payment_method'];

        return [
            'user_id' => Profile::factory()->create()->user_id,
            'address' => $this->faker->text(200),
            'phone' => '0933750123',
            'note' => $this->faker->text(100),
            'status' => $statuses[array_rand($statuses, 1)],
            'shipping_method' => $shipping[array_rand($shipping, 1)],
            'payment_method' => $payment[array_rand($payment, 1)],
        ];
    }
}
