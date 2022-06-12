<?php

namespace Database\Factories;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => 'FKA'.rand(100000,999999),
            'delivery_address' => $this->faker->streetAddress(),
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'status' => 0 ,
           
        ];
    }
}
