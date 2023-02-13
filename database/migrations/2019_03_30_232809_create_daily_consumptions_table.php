<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_consumptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meter_id');
            $table->decimal('usage', 20, 8);
            $table->date('date')->nullable();

            $table->foreign('meter_id')
                  ->references('id')
                  ->on('meters')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_consumptions');
    }
}
