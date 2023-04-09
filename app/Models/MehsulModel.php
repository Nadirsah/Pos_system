<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MehsulModel extends Model
{
    use HasFactory;

    public function getKategory()
    {
        return $this->hasOne('App\Models\KategoriyaModel', 'id', 'page_id');
    }
}
