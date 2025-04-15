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
        Schema::create('our_core_values', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->string('big_img_right_side')->nullable();
            
            $table->string('side_img1')->nullable();
            $table->string('side_img1_title')->nullable();
            $table->string('side_img1_content')->nullable();

            $table->string('side_img2')->nullable();
            $table->string('side_img2_title')->nullable();
            $table->string('side_img2_content')->nullable();

            $table->string('side_img3')->nullable();
            $table->string('side_img3_title')->nullable();
            $table->string('side_img3_content')->nullable();

            $table->string('side_img4')->nullable();
            $table->string('side_img4_title')->nullable();
            $table->string('side_img4_content')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_core_values');
    }
};
