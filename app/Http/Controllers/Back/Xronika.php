<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\XronikaPostRequest;
use App\Models\HeaderModel;
use App\Models\SifarisModel;
use Illuminate\Support\Str;

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
       
        $data = new SifarisModel;
        $data->masa_id = $request->masa_id;
        $data->kategoriya = $request->name;
        $data->mehsul = $request->mehsul;
        $data->price = $request->price;
$data->save();
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
        $data->header_id = $request->info;
        $data->name = $request->title;
        $data->content = $request->content;

        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);

            $data->img = 'uploads/'.$imagename;
        }
        $data->update();

        return  redirect()->route('admin.xronika.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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
