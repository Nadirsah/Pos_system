<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\InfoModel;
use App\Models\XeberlerModel;
use App\Models\PageModel;

class FrontController extends Controller
{
    public function index()
    {   $xeber = XeberlerModel::all();
        $data = InfoModel::orderBy('name', 'ASC')->get();
        $page = PageModel::all();
        return view('front.index', compact('data','xeber','page'));
    }

   public function page($slug){
    $data=InfoModel::findOrFail($slug)->first() ?? abort(403,'Sehife tapilmadi');

    return view("front.pages",compact("data"));
   }
}
