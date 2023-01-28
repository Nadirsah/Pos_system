<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HeaderindexModel;
use App\Models\InfoModel;
use App\Models\PageModel;
use App\Models\XeberlerModel;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $page = PageModel::orderBy('orders', 'asc')->get();
        $info = InfoModel::all();
        $header = HeaderindexModel::find(1);
        $slides = XeberlerModel::all();

        return view('front.index', compact('page', 'info', 'header', 'slides'));
    }

    public function page($slug)
    {
        $page = PageModel::orderBy('orders', 'asc')->get();
        $data = InfoModel::where('slug', '=', $slug)->get();
        $header = HeaderindexModel::find(1);

        return view('front.page', compact('data', 'page', 'header'));
    }

    public function news($id)
    {
        $page = PageModel::orderBy('orders', 'asc')->get();
        $data = InfoModel::findOrFail($id);
        $header = HeaderindexModel::find(1);

        return view('front.single_post', compact('data', 'page', 'header'));
    }

   public function search(Request $request)
   {
       $page = PageModel::orderBy('orders', 'asc')->get();
       $data = InfoModel::findOrFail($id);
       $header = HeaderindexModel::find(1);
       $search = InfoModel::where('name', 'like', '%'.$request->search.'%')
       ->all();

       return view('front.search', compact('search', 'data', 'page', 'header'));
   }
}
