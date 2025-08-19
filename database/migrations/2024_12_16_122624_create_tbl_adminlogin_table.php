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
        Schema::create('tbl_adminlogin', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password'); // Password will be hashed
            $table->timestamps();
        });

        // Insert the static admin entry
        \Illuminate\Support\Facades\DB::table('tbl_adminlogin')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin123'), // Use bcrypt for hashing passwords
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_adminlogin');
    }
};
