<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'masa_id',
        'kategoriya',
        'mehsul',
        'price',
        'miqdar',
        'sifaris',
        'odenis',
    ];
}
