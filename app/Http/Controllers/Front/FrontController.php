<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FotoModel;
use App\Models\HeaderindexModel;
use App\Models\HeaderinfoModel;
use App\Models\InfoModel;
use App\Models\LinkModel;
use App\Models\NaxcivanModel;
use App\Models\PageModel;
use App\Models\QarabagModel;
use App\Models\QezetModel;
use App\Models\XeberlerModel;
use App\Models\XronikaModel;

class FrontController extends Controller
{
    public function index()
    {
        $page = PageModel::all();
        $xeber = XeberlerModel::all();
        $xebertitle = XeberlerModel::first();
        $xeberimg = XeberlerModel::first();
        $xeberslideimg = XeberlerModel::first();
        $foto = FotoModel::all();
        $link = LinkModel::all();
        $naxcivan = NaxcivanModel::all();
        $qarabag = QarabagModel::all();
        $qezet = QezetModel::all();
        $xronika = XronikaModel::all();
        $headerinfo = HeaderinfoModel::all();
        $indexheader = HeaderindexModel::first();

        return view('front.index', compact('xeber', 'indexheader', 'foto', 'link', 'qarabag', 'qezet', 'xronika', 'headerinfo', 'page', 'xebertitle', 'xeberimg', 'xeberslideimg'));
    }

   public function page($slug)
   {
       $page = PageModel::all();
       $title = PageModel::where('slug', '=', $slug)->get();
       $data = InfoModel::where('slug', '=', $slug)->get() ?? abort(403);

       return view('front.pages', compact('data', 'page', 'title'));
   }

   public function news($id)
   {
       $page = PageModel::all();
       $data = InfoModel::findOrFail($id) ?? abort(403, 'melumat yoxdu');

       return view('front.news', compact('data', 'page'));
   }
}
