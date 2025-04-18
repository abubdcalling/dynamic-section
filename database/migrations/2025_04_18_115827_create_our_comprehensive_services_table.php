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
        Schema::create('our_comprehensive_services', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();

            $table->string('title1')->nullable();
            $table->text('content1')->nullable();
            $table->string('img1')->nullable();

            $table->string('title2')->nullable();
            $table->text('content2')->nullable();
            $table->string('img2')->nullable();

            $table->string('title3')->nullable();
            $table->text('content3')->nullable();
            $table->string('img3')->nullable();

            $table->string('title4')->nullable();
            $table->text('content4')->nullable();
            $table->string('img4')->nullable();

            $table->string('title5')->nullable();
            $table->text('content5')->nullable();
            $table->string('img5')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_comprehensive_services');
    }
};
