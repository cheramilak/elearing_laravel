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
        Schema::create('student_tutorials', function (Blueprint $table) {
            $table->id();
            $table->integer('cat')->comment('1 = tutor,3 = traning 2 = reserch,4 = enterpenrship');
            $table->json('schedule')->nullable();
            $table->json('course')->nullable();
            $table->string('selected_grade')->nullable();
            $table->string('type')->nullable();
            $table->string('study')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_tutorials');
    }
};
