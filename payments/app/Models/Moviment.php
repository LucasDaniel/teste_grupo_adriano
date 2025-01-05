<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moviment extends Model
{
    use HasFactory;

    protected $table = 'moviments';

    protected $fillable = [
        'id_state_moviment',
        'id_user',
        'returned',
        'value'
    ];
}
