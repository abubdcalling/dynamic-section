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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('breadcrumb')->nullable();
            $table->string('main_title')->nullable();
            $table->longText('sub_title')->nullable();



            $table->string('title_our_address_section')->nullable();
            $table->string('icon_our_address_section')->nullable();
            $table->string('address_our_address_section')->nullable();
            
            
            $table->string('title_our_contact_section')->nullable();
            $table->string('mail_icon_our_contact_section')->nullable();
            $table->string('mail_address_our_contact_section')->nullable();
            
            $table->string('icon_our_contact_section')->nullable();
            $table->string('phone_number_our_contact_section')->nullable();
            $table->string('copyright')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
