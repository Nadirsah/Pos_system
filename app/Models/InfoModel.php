<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoModel extends Model
{
    use HasFactory;

    public function getPage()
    {
        return $this->hasOne('App\Models\PageModel', 'id', 'page_id');
    }
}
