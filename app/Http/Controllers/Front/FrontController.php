<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ayarlar;
use App\Models\InfoModel;
use App\Models\PageModel;
use App\Models\Table_1;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $page = PageModel::orderBy('orders', 'asc')->get();
        $info = InfoModel::latest()->limit(6)->get();
        $header = Ayarlar::find(1);
        $slides = Table_1::all();
        $hit=InfoModel::orderBy('hit', 'Desc')->limit(3)->get();
        return view('front.index', compact('page', 'info', 'header', 'slides','hit'));
    }

    public function page($slug)
    {
        $page = PageModel::orderBy('orders', 'asc')->get();
        $data = InfoModel::where('slug', '=', $slug)->get();
        $header = Ayarlar::find(1);
       
        return view('front.page', compact('data', 'page', 'header'));
    }

    public function news($id)
    {
        $page = PageModel::orderBy('orders', 'asc')->get();
        $data = InfoModel::findOrFail($id);
        $header = Ayarlar::find(1);
        $hit=InfoModel::findOrFail($id)->increment('hit');
        return view('front.single_post', compact('data', 'page', 'header'));
    }

   public function axtar(Request $request)
   {
       $page = PageModel::orderBy('orders', 'asc')->get();
       $data = InfoModel::findOrFail($id);
       $header = Ayarlar::find(1);
       $search = $request->input('search');
       $posts = InfoModel::where('name', 'LIKE', "%{$search}%")
        ->get();
       

       

       return view('front.search', compact('posts', 'data', 'page', 'header'));
   }

   

   
}
