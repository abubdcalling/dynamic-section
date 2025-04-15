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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('main_title_from_1st_section')->nullable();
            $table->string('icon_from_1st_section')->nullable();
            $table->longText('content_from_1st_section')->nullable();
            $table->string('key_title_from_1st_section')->nullable();
            $table->longText('sub_content_from_1st_section')->nullable();

            $table->string('main_title_from_2nd_section')->nullable();
            $table->string('icon_from_2nd_section')->nullable();
            $table->longText('content_from_2nd_section')->nullable();
            $table->string('key_title_from_2nd_section')->nullable();
            $table->longText('sub_content_from_2nd_section')->nullable();

            $table->string('main_title_from_3rd_section')->nullable();
            $table->string('icon_from_3rd_section')->nullable();
            $table->longText('content_from_3rd_section')->nullable();
            $table->string('key_title_from_3rd_section')->nullable();
            $table->longText('sub_content_from_3rd_section')->nullable();


            $table->string('main_title_from_4th_section')->nullable();
            $table->string('icon_from_4th_section')->nullable();
            $table->longText('content_from_4th_section')->nullable();
            $table->string('key_title_from_4th_section')->nullable();
            $table->longText('sub_content_from_4th_section')->nullable();


            $table->string('main_title_from_5th_section')->nullable();
            $table->string('icon_from_5th_section')->nullable();
            $table->longText('content_from_5th_section')->nullable();
            $table->string('key_title_from_5th_section')->nullable();
            $table->longText('sub_content_from_5th_section')->nullable();





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
