<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_name');
            $table->string('thumbnail_path');
            $table->string('video_option');
            $table->string('video_path')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('videos');
    }
};
