<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateMoviment extends Model
{
    use HasFactory;

    protected $table = 'state_moviments';

    protected $fillable = [
        'state'
    ];
}
