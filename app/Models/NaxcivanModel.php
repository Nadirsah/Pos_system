<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaxcivanModel extends Model
{
    use HasFactory;

    protected $table = ('naxcivan_models');

    public function getHeader()
    {
        return $this->hasOne('App\Models\HeaderModel', 'id', 'header_id');
    }
}
