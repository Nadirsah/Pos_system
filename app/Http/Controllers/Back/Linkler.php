<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderModel;
use App\Models\LinkModel;
use Illuminate\Http\Request;
use App\Http\Requests\LinkPostRequest;
use Illuminate\Support\Str;

class Linkler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = LinkModel::all();

        return view('back.mainpageinfo.linkler.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.linkler.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkPostRequest $request)
    {
        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg|max:200',
        'fon' => 'required|image|mimes:jpeg,png,jpg|max:200']);
       
        $data = new LinkModel;
        $data->header_id = $request->info;
        $data->name = $request->name;

        if ($request->hasFile('image', 'fon')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();
            $fonname = Str::random(5).'.'.$request->fon->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imagename);
            $request->fon->move(public_path('uploads'), $fonname);
            $data->img = 'uploads/'.$imagename;
            $data->fon = 'uploads/'.$fonname;
        }

        $data->save();

        return  redirect()->route('admin.linkler.index')->with(["success"=>"Məlumat əlavə olundu!"]);
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
        $data = LinkModel::findOrFail($id);

        return view('back.mainpageinfo.linkler.update', compact('data', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkPostRequest $request, $id)
    {
        $request->validate([
            
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $data = LinkModel::findOrFail($id);

        $data->header_id = $request->info;
        $data->name = $request->name;

        if ($request->hasFile('image', 'fon')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();
            $fonname = Str::random(5).'.'.$request->fon->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imagename);
            $request->fon->move(public_path('uploads'), $fonname);
            $data->img = 'uploads/'.$imagename;
            $data->fon = 'uploads/'.$fonname;
        }
        $data->update();

        return  redirect()->route('admin.linkler.index')->with(["success"=>"Məlumat uğurla yeniləndi!"]);
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
        $data = LinkModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.linkler.index')->with(["success"=>"Məlumat uğurla silindi!"]);
    }
}