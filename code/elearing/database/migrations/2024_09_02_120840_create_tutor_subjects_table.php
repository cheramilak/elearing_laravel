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
        Schema::create('tutor_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_tutorials_id');
            $table->foreign('student_tutorials_id')->on('student_tutorials')->references('id')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade'); // Foreign key reference to subjects
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_subjects');
    }
};
