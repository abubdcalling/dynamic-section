<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'breadcrumb',
        'main_title',
        'sub_title',

        'first_name',
        'last_name',
        'company_name',
        'email_address',
        'phone_number',
        'comments',
        'submit',

        'title_our_address_section',
        'icon_our_address_section',
        'address_our_address_section',

        'title_our_contact_section',
        'mail_icon_our_contact_section',
        'mail_address_our_contact_section',

        'icon_our_contact_section',
        'phone_number_our_contact_section',
        'copyright',
    ];
}
