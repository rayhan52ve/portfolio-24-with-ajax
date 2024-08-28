<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
            'name',
            'description',
            'email',
            'phone',
            'designation',
            'address',
            'age',
            'image',
            'nationality',
            'freelance',
            'experience',
            'languages',
            'linkedin',
            'complete_project',
            'cv',
    ];
}
