<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SifarisModel extends Model
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

    public function getKategory()
    {
        return $this->hasOne('App\Models\KategoriyaModel', 'id', 'kategoriya');
    }

    public function getMehsul()
    {
        return $this->hasOne('App\Models\MehsulModel', 'id', 'mehsul');
    }

    public function getQiymet()
    {
        return $this->hasOne('App\Models\MehsulModel', 'id', 'price');
    }

    public function getMasa()
    {
        return $this->hasOne('App\Models\MasaModel', 'id', 'masa_id');
    }
}
