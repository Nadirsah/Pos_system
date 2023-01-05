<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderInfoModel;
use App\Models\HeaderModel;
use Illuminate\Http\Request;

class Esasinfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = HeaderInfoModel::all();

        return view('back.mainpageinfo.esasinfo.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.esasinfo.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',

        ]);
        $data = new HeaderinfoModel;
        $data->header_id = $request->info;
        $data->name = $request->name;
        $data->content = $request->content;

        $data->save();

        return  redirect()->route('admin.esasinfo.index');
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
        $data = HeaderInfoModel::findOrFail($id);

        return view('back.mainpageinfo.esasinfo.update', compact('data', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',

        ]);
        $data = new HeaderInfoModel;
        $data->header_id = $request->info;
        $data->name = $request->name;
        $data->content = $request->content;

        $data->update();

        return  redirect()->route('admin.esasinfo.index');
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
        $data = HeaderInfoModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.esasinfo.index');
    }
}
