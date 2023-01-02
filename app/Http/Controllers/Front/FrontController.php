<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\InfoModel;


class FrontController extends Controller
{
    public function index()
    {   $data=InfoModel::orderBy("name","ASC")->get();
        return view('front.index',compact("data"));
    }
    public function tarix()
    {$data=InfoModel::where("slug","tarix")->orderBy("name","ASC")->paginate(3);
        return view('front.tarix',compact("data"));
    }
    public function tebiet()
    {$data=InfoModel::where("slug","tebiet")->orderBy("name","ASC")->paginate(3);
        return view('front.tebiet',compact("data"));
    }
    public function medeniyyet()
    {$data=InfoModel::where("slug","medeniyyet")->orderBy("name","ASC")->paginate(3);
        return view('front.medeniyyet',compact("data"));
    }
    public function sehiyye()
    {$data=InfoModel::where("slug","sehiyye")->orderBy("name","ASC")->paginate(3);
        return view('front.sehiyye',compact("data"));
    }
    public function elm_tehsil()
    {$data=InfoModel::where("slug","elm-ve-tehsil")->orderBy("name","ASC")->paginate(3);
        return view('front.elm_ve_tehsil',compact("data"));
    }
    public function iqtisadiyyat()
    {$data=InfoModel::where("slug","iqtisadiyyat")->orderBy("name","ASC")->paginate(3);
        return view('front.iqtisadiyyat',compact("data"));
    }

    public function news($id)
    {   $data=InfoModel::findOrFail($id);
        return view('front.news',compact("data"));
    }
}
