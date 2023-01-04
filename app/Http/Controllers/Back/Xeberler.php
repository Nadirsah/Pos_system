<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderModel;
use App\Models\XeberlerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Xeberler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = XeberlerModel::all();

        return view('back.mainpageinfo.xeberler.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.xeberler.create', compact('header'));
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

        ]);
        $data = new XeberlerModel;
        $data->header_id = $request->info;
        $data->name = $request->name;
        $data->content = $request->content;

        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);

            $data->img = 'uploads/'.$imagename;
        }
        $data->save();

        return  redirect()->route('admin.xeberler.index');
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
        $data = XeberlerModel::findOrFail($id);

        return view('back.mainpageinfo.xeberler.update', compact('data', 'header'));
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
        $data = XeberlerModel::findOrFail($id);
        $data->header_id = $request->info;
        $data->name = $request->title;
        $data->content = $request->content;

        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);

            $data->img = 'uploads/'.$imagename;
        }

        $data->update();

        return  redirect()->route('admin.xeberler.index');
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
        $data = XeberlerModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.xeberler.index');
    }
}
