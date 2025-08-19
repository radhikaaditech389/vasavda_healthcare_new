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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('logo_image');
            $table->string('description');
            $table->string('address');
            $table->integer('phone_no');
            $table->string('email');
            $table->string('days');
            $table->string('hospital_time');
            $table->string('consulting_time');
            $table->string('yt_link');
            $table->string('insta_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
