<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('image_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('img_path');
            $table->string('event_name');
            $table->string('right');
            $table->string('left');
            $table->string('buttom');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_carousels');
    }
};
