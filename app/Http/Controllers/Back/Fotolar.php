<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\FotoModel;
use App\Models\HeaderModel;
use Illuminate\Http\Request;
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
        $info = FotoModel::all();

        return view('back.mainpageinfo.fotolar.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.fotolar.create', compact('header'));
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
        $data = new FotoModel;
        $data->header_id = $request->info;
        $data->name = $request->name;

        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);
            $data->img = 'uploads/'.$imagename;
        }
        $data->save();

        return  redirect()->route('admin.fotolar.index');
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

        return view('back.mainpageinfo.fotolar.update', compact('data', 'header'));
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
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $data = FotoModel::findOrFail($id);

        $data->header_id = $request->info;
        $data->name = $request->name;

        if ($request->hasFile('image')) {
            $imagename = ($request->name).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);
            $data->img = 'uploads/'.$imagename;
        }
        $data->update();

        return  redirect()->route('admin.fotolar.index');
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

        return redirect()->route('admin.fotolar.index');
    }
}
