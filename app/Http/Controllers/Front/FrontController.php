<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FotoModel;
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

        return view('front.index', compact('xeber', 'foto', 'link', 'qarabag', 'qezet', 'xronika', 'headerinfo', 'page', 'xebertitle', 'xeberimg', 'xeberslideimg'));
    }

   public function page($slug)
   {
       $data = InfoModel::where('slug', $slug);

       return view('front.pages', compact('data'));
   }
}
