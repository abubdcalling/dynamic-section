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

            $table->string('main_title')->nullable();

            $table->string('subtitle1')->nullable();
            $table->text('description1')->nullable();
            $table->string('icon1')->nullable();

            $table->string('subtitle2')->nullable();
            $table->text('description2')->nullable();
            $table->string('icon2')->nullable();

            $table->string('subtitle3')->nullable();
            $table->text('description3')->nullable();
            $table->string('icon3')->nullable();

            $table->string('subtitle4')->nullable();
            $table->text('description4')->nullable();
            $table->string('icon4')->nullable();

            $table->string('img')->nullable();



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
