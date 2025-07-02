<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalizeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalize_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('zodiac_sign');
            $table->string('date_of_birth');
            $table->string('time_of_birth');
            $table->string('place_of_birth');
            $table->string('current_location');
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
        Schema::dropIfExists('personalize_details');
    }
}
