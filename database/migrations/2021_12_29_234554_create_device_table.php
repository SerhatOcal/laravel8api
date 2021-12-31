<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
			$table->id();
			$table->string('uid', 80)->unique()->nullable()->default(null);
			$table->string("appId",55);
            $table->string("language",25);
            $table->string("operating_system",25);
			$table->string('token', 64)->nullable()->default(null);
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device');
    }
}
