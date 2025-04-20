<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name1',
        'link1',
        'name2',
        'link2',
        'name3',
        'link3',
        'name4',
        'link4',
        'logo',
    ];
    
}
