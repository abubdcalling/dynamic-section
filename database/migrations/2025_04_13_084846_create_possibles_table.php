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
        Schema::create('possibles', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->longText('title1')->nullable();       
            $table->longText('title1_content')->nullable();
            $table->longText('title2')->nullable();       
            $table->longText('title2_content')->nullable();       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('possibles');
    }
};
