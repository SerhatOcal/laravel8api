<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\App\Models\Device::factory(1000)->create();
	}
}