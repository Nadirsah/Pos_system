<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\InfoModel;
use App\Models\HeaderindexModel;

class FrontController extends Controller
{
    public function index(){
        $page=PageModel::orderBy("orders",'asc')->get();
        $info=InfoModel::all();
        $header=HeaderindexModel::find(1);
        return view('front.index',compact('page','info','header'));
    }

    public function page($slug)
    { 
        $page = PageModel::orderBy("orders",'asc')->get();
        $data = InfoModel::where('slug', '=', $slug)->get() ;
        return view('front.page', compact('data', 'page'));
    }

    public function news($id)
     {
       $page = PageModel::orderBy("orders",'asc')->get();
       $data = InfoModel::findOrFail($id) ;
       return view('front.single_post', compact('data', 'page'));
   }

   public function search(Request $request){
$data=InfoModel::where("name",'like','%'.$request->search.'%')
->get();

    return view('front.search',compact('data'));
   }
}
