<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAuth extends Model
{
    use HasFactory;

    protected $table = 'admin_auth';

    protected $fillable = [
        'id_user',
        'token',
        'expiration'
    ];
}
