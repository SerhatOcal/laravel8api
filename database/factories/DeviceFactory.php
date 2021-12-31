<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'uid' => $this->faker->md5("uid"),
			'appId' => $this->faker->md5("appId"),
			'language' => 'TR',
			'operating_system' => 'IOS',
			'token' => $this->faker->md5("token")
        ];
    }
}
