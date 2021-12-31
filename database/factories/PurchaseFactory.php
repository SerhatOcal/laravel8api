<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'receipt' 		=> $this->faker->md5,
			'status' 		=> 1,
			'expire_date' 	=> $this->faker->dateTime,
			'uid'			=> $this->faker->md5
        ];
    }
}
