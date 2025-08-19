<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_section_id');
            $table->string('about_image');
            $table->timestamps();

            $table->foreign('about_section_id')->references('id')->on('about_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_images');
    }
};
