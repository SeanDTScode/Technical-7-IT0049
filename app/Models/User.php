<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username',
        'full_name',
        'avatar',
        'created_at',
    ];

    public $timestamps = false;
}