<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoModel extends Model
{
    use HasFactory;

    public function getHeader()
    {
        return $this->hasOne('App\Models\HeaderModel', 'id', 'header_id');
    }
}
