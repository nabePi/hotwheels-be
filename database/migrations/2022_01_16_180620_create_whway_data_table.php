<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhwayDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whway_data', function (Blueprint $table) {
            $table->id();
            $table->string('child_name');
            $table->string('parent_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('instagram');
            $table->string('image');
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
        Schema::dropIfExists('whway_data');
    }
}
