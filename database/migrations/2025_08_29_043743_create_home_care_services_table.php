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
        Schema::create('home_care_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->unsignedInteger('display_order');
            $table->boolean('is_active')->default(true);

            $table->longText('purpose_html')->nullable();
            $table->longText('services_html')->nullable();
            $table->longText('benefits_html')->nullable();
            $table->longText('considerations_html')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_care_services');
    }
};
