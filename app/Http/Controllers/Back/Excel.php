<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Excel extends Controller
{
   Public function index(){
    $data=User::all();
    return view('back.excel.profil',compact('data'));
   }
}
