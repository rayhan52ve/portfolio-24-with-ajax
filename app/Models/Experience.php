<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    Protected $table = 'experience';
    protected $fillable = [
        'title',
        'sector',
        'description',
        'time',
];
}
