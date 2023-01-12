<?php

namespace App\Http\Controllers\Back;
use App\Http\Requests\HeaderIndexPostRequest;
use App\Models\HeaderModel;
use App\Models\HeaderindexModel;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexHeader extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = HeaderindexModel::all();

        return view('back.mainpageinfo.header.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.header.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeaderIndexPostRequest $request)
    {
        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg|max:200']);
        $data = new HeaderindexModel;
        $data->header_id = $request->info;
        $data->name = $request->name;
        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);

            $data->img = 'uploads/'.$imagename;
        }

        $data->save();

        return  redirect()->route('admin.indexheader.index')->with(['success' => 'Məlumat əlavə olundu!']);
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
        $data = HeaderindexModel::findOrFail($id);

        return view('back.mainpageinfo.header.update', compact('data', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HeaderIndexPostRequest $request, $id)
    { $request->validate([

            'image' => 'image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $data = HeaderindexModel::findOrFail($id);
        $data->header_id = $request->info;
        $data->name = $request->title;
        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imagename);
            $data->img = 'uploads/'.$imagename;
        }
        $data->update();
        return  redirect()->route('admin.indexheader.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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
        $data = HeaderindexModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.indexheader.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }
}
