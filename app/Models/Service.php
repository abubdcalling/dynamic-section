<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // app/Models/OurComprehensiveService.php

protected $fillable = [
    'main_title',

    'subtitle1', 'description1', 'icon1',
    'subtitle2', 'description2', 'icon2',
    'subtitle3', 'description3', 'icon3',
    'subtitle4', 'description4', 'icon4',

    'img',
];

    
    
}
