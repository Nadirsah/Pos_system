<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderModel;
use App\Models\InfoModel;
use App\Models\PageModel;
use App\Models\SifarisModel;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masa = PageModel::all();
        $kategoriya = HeaderModel::all();
        $sifaris = SifarisModel::where('sifaris', '=', 0)->get();
        $totalsifaris = SifarisModel::all();
        $mehsul=Infomodel::all();

        return view('back.dashboard', compact('masa', 'kategoriya', 'totalsifaris'));
    }

    public function getOrder()
    {
        $masa = PageModel::all();
        $kategoriya = HeaderModel::all();
        $sifaris = SifarisModel::where('sifaris', '=', 0)->get();
        $mehsul=Infomodel::all();
        return view('back.orderlist', compact('sifaris', 'masa', 'kategoriya','mehsul'));
    }

    public function getOrderCedvel()
    {
        $masa = PageModel::all();
        $kategoriya = HeaderModel::all();
        $sifaris = SifarisModel::where('sifaris', '=', 0)->get();
        $mehsul=Infomodel::all();
        $totalsifaris = SifarisModel::all();
        return view('back.ordercedvel', compact('totalsifaris'));
    }



    public function getmehsul(Request $request)
    {
        $kid = $request->post('kid');
        $mehsul = InfoModel::where('page_id', $kid)->get();
        $html = '<option value="">Mehsul seçin</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }

    public function getqiymet(Request $request)
    {
        $kid = $request->post('kid');
        $mehsul = InfoModel::where('page_id', $kid)->get();
        $html = '<option value="">Qiymet</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->price.'</option>';
        }
        echo $html;
    }

    public function geteditmehsul(Request $request)
    {
        $kid = $request->post('editkid');
        $mehsul = InfoModel::where('page_id', $kid)->get();
        $html = '<option value="">Mehsul seçin</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }

    public function geteditqiymet(Request $request)
    {
        $kid = $request->post('editkid');
        $mehsul = InfoModel::where('page_id', $kid)->get();
        $html = '<option value="">Qiymet</option>';
        foreach ($mehsul as $list) {
            $html .= '<option value="'.$list->id.'">'.$list->price.'</option>';
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
    $subcategories = InfoModel::where('page_id', $kategory_id)->pluck('name','price', 'id');
    return response()->json($subcategories);
}
}
