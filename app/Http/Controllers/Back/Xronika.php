<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\XronikaPostRequest;
use App\Models\HeaderModel;
use App\Models\SifarisModel;

class Xronika extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = SifarisModel::all();

        return view('back.mainpageinfo.sifaris.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.sifaris.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(XronikaPostRequest $request)
    {
        // $data = new SifarisModel;
        // $data->masa_id = $request->masa_id;
        // $data->kategoriya = $request->kategoriya;
        // $data->mehsul = $request->mehsul;
        // $data->price = $request->price;
        // $data->sifaris = $request->sifaris;
        // $data->save();
        foreach ($request->inputs as $key => $value) {
            SifarisModel::create($value);
        }

        return  redirect()->route('admin.panel')->with(['success' => 'Məlumat əlavə olundu!']);
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
        $header = HeaderModel::all();
        $data = SifarisModel::findOrFail($id);

        return view('back.mainpageinfo.sifaris.update', compact('data', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(XronikaPostRequest $request, $id)
    {
        $data = SifarisModel::findOrFail($id);
        $data->masa_id = $request->masa_id;
        $data->kategoriya = $request->kategoriya;
        $data->mehsul = $request->mehsul;
        $data->price = $request->price;
        $data->sifaris = $request->sifaris;

        $data->update();
if($request->sifaris==0){
    return  redirect()->route('admin.panel')->with(['success' => 'Məlumat uğurla yeniləndi!']);
}else
        return  redirect()->route('admin.print.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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

    public function delete($id)
    {
        $data = SifarisModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.xronika.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }
}
