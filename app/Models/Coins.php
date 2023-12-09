<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
    use HasFactory;

    protected $table = 'coins';

    protected $fillable = [
        'coins',
    ];

    protected $casts = [
        'coins' => 'array',
    ];
}
