<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SifarisModel extends Model
{
    use HasFactory;

    public function getKategory()
    {
        return $this->hasOne('App\Models\HeaderModel', 'id', 'kategoriya');
    }
    public function getMehsul()
    {
        return $this->hasOne('App\Models\InfoModel', 'id', 'mehsul');
    }
}
