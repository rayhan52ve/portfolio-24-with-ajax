<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protfolio extends Model
{
    use HasFactory;
    protected $table = 'protfolio';
    protected $fillable = [
            'title',
            'description',
            'project',
            'email',
            'call',
            'facebook',
            'twitter',
            'github',
            'youtube',
            'img_title',
            'language',
            'image',
];

}
