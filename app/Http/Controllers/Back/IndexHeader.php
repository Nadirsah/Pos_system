<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderIndexPostRequest;
use App\Models\HeaderindexModel;
use Illuminate\Support\Str;

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

        return view('back.mainpageinfo.ayarlar.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = HeaderindexModel::find(1);

        return view('back.mainpageinfo.ayarlar.create', compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeaderIndexPostRequest $request)
    {$request->validate(['image' => 'required|image|mimes:jpeg,png,jpg|max:200']);
        $data = new HeaderindexModel;

        $data->name = $request->name;
        $data->activ = $request->activ;
        $data->fb = $request->fb;
        $data->ins = $request->ins;
        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);
            $data->image = 'uploads/'.$imagename;
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
        $info = HeaderindexModel::findOrFail($id);

        return view('back.mainpageinfo.ayarlar.update', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HeaderIndexPostRequest $request, $id)
    {
        $data = HeaderindexModel::findOrFail($id);
        $data->name = $request->name;
        $data->about = $request->about;
        $data->activ = $request->activ;
        $data->facebook = $request->fb;
        $data->instagram = $request->ins;
        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);
            $data->image = 'uploads/'.$imagename;
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