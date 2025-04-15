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
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            
            $table->string('main_title')->nullable();

            $table->string('left_side_main_title')->nullable();
            $table->string('left_side_icon')->nullable();
            $table->string('left_side_comments')->nullable();
            $table->longText('left_side_key_title')->nullable();
            $table->longText('left_side_content')->nullable();
            
            $table->string('middle_side_main_title')->nullable();
            $table->string('middle_side_icon')->nullable();
            $table->string('middle_side_comments')->nullable();
            $table->longText('middle_side_key_title')->nullable();
            $table->longText('middle_side_content')->nullable();

            $table->string('right_side_img')->nullable();
            $table->string('right_side_icon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us');
    }
};
