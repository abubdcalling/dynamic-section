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
            $table->string('breadcrumb')->nullable(false);
            $table->string('main_title')->nullable(false);
            $table->string('sub_title')->nullable(false);



            $table->string('title_our_address_section')->nullable(false);
            $table->string('icon_our_address_section')->nullable(false);
            $table->string('address_our_address_section')->nullable(false);
            
            
            $table->string('title_our_contact_section')->nullable(false);
            $table->string('mail_icon_our_contact_section')->nullable(false);
            $table->string('mail_address_our_contact_section')->nullable(false);
            
            $table->string('icon_our_contact_section')->nullable(false);
            $table->string('phone_number_our_contact_section')->nullable(false);
            $table->string('copyright')->nullable(false);
            
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
