<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accout extends Model
{
    protected $table = 'users'; 

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
    ];
}
