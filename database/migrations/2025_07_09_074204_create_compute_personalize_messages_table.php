<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputePersonalizeMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compute_personalize_messages', function (Blueprint $table) {
            $table->id();
             $table->string('user_id');
            $table->text('message');
            $table->date('date');
            $table->date('dob');
            $table->time('tob');
            $table->string('pob');
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
        Schema::dropIfExists('compute_personalize_messages');
    }
}
