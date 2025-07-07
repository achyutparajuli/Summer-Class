<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->text('description')->nullable();
            $table->decimal('duration');
            $table->date('release_date');
            $table->decimal('rating');
            $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade');
            $table->string('language', 15)->default('english');
            $table->text('cast')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
