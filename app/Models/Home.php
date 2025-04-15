<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_title',
        'sub_title_after_main_title',
        'img',
        'second_sub_title_content',
        'name',
        'link',
    ];
}
