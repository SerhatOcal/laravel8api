<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\App\Models\Purchase::factory(1000)->create();

	}
}
