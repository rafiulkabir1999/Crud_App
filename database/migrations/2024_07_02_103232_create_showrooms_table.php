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
        Schema::create('showrooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ShowroomID')->nullable();
            $table->string('ShowroomName')->nullable(false);
            $table->string('ShowroomAddress')->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->string('Email')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('MapAddress')->nullable();
            $table->string('Area')->nullable();
        });
 

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showrooms');
    }
};
