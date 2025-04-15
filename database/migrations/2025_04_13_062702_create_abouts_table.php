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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable(); // About Us main title
            $table->string('img1')->nullable(); // Image 1 path
            $table->string('img2')->nullable(); // Image 2 path
            $table->longText('1st_paragraph_subtitle')->nullable(); // Subtitle for 1st paragraph
            $table->longText('1st_paragraph_content')->nullable(); // Content for 1st paragraph
            $table->longText('2nd_paragraph_subtitle')->nullable(); // Subtitle for 2nd paragraph
            $table->longText('2nd_paragraph_content')->nullable(); // Content for 2nd paragraph
            $table->string('name')->nullable();
            $table->string('link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
