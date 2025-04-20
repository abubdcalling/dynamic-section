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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name1')->nullable();
            $table->text('link1')->nullable();
            $table->string('name2')->nullable();
            $table->text('link2')->nullable();
            $table->string('name3')->nullable();
            $table->text('link3')->nullable();
            $table->string('name4')->nullable();
            $table->text('link4')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
