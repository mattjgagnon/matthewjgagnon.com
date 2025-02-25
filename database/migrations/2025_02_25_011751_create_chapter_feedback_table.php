<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('chapter_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade'); // Link to chapter
            $table->string('name'); // Reader's name
            $table->string('email')->nullable(); // Optional email
            $table->text('message'); // Feedback message
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chapter_feedback');
    }
};
