<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\KategoriyaModel;
use App\Models\Masamodel;
use App\Models\MehsulModel;
use App\Models\SifarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masa = MasaModel::all();
        $kategoriya = KategoriyaModel::all();
        $sifaris = SifarisModel::where('sifaris', '=', 0)->get();
        $totalsifaris = SifarisModel::where('sifaris', '=', 0)->get();

        $mehsul = MehsulModel::all();

        return view('back.dashboard', compact('masa', 'kategoriya', 'totalsifaris', 'mehsul'));
    }

// activ sifarisler
    public function getOrder()
    {
        $masa = MasaModel::all();
        $kategoriya = KategoriyaModel::all();
        $sifaris = SifarisModel::where('sifaris', '=', 0)->get();
        $mehsul = MehsulModel::all();

        return view('back.orderlist', compact('sifaris', 'masa', 'kategoriya', 'mehsul'));
    }

// activ sifarisler cedveli
    public function getOrderCedvel()
    {
        $masa = MasaModel::all();
        $kategoriya = KategoriyaModel::all();
        $sifaris = SifarisModel::where('sifaris', '=', 0)->get();
        $mehsul = MehsulModel::all();

        $totalsifaris = SifarisModel::where('sifaris', '=', 0)->get();

        return view('back.ordercedvel', compact('totalsifaris', 'masa', 'kategoriya', 'mehsul', 'sifaris'));
    }

    public function getOrderPrint()
    {
        $masa = MasaModel::all();
        $kategoriya = KategoriyaModel::all();
        $sifaris = SifarisModel::where('sifaris', '=', 0)->get();
        $mehsul = MehsulModel::all();
        $totalsifaris = SifarisModel::latest()->first();

        return view('back.orderprint', compact('totalsifaris'));
    }

//sifaris melumatlari
    public function getmehsul(Request $request)
    {
        $kid = $request->post('kid');
        $mehsul = MehsulModel::where('page_id', $kid)->get();
        $html = '<option value="">Mehsul seçin</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }

    public function getqiymet(Request $request)
    {
        $mid = $request->post('mid');
        $mehsul = MehsulModel::where('id', $mid)->get();
        $html = '<option value="">Qiymet</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->sale_price.'</option>';
        }
        echo $html;
    }

//end sifaris melumatlari
    public function geteditmehsul(Request $request)
    {
        $mid = $request->post('mid');
        $mehsul = MehsulModel::where('page_id', $mid)->get();
        $html = '<option value="">Mehsul</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }

    public function geteditqiymet(Request $request)
    {
        $kid = $request->post('kid');
        $mehsul = MehsulModel::where('id', $kid)->get();
        $html = '<option value="">Qiymet</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->sale_price.'</option>';
        }
        echo $html;
    }
    
       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchSubCategories(Request $request)
    {
        $kategory_id = $request->get('kategory_id');
        $subcategories = MehsulModel::where('page_id', $kategory_id)->pluck('name', 'price', 'id');

        return response()->json($subcategories);
    }
}
