<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoPostRequest;
use App\Models\FotoModel;
use App\Models\HeaderModel;
use App\Models\SifarisModel;
use Illuminate\Support\Str;

class Fotolar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = SifarisModel::where('sifaris', '=', 1)->paginate(10);

        return view('back.mainpageinfo.hesabat.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.hesabat.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoPostRequest $request)
    {
        
        $data = new FotoModel;
       
        $data->name = $request->name;

        
        $data->save();

        return  redirect()->route('admin.fotolar.index')->with(['success' => 'Məlumat əlavə olundu!']);
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
        $data = FotoModel::findOrFail($id);

        return view('back.mainpageinfo.hesabat.update', compact('data', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FotoPostRequest $request, $id)
    {
       
        $data = FotoModel::findOrFail($id);

        
        $data->name = $request->name;

       
        $data->update();

        return  redirect()->route('admin.fotolar.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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
        $data = FotoModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.fotolar.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }
}
