<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderModel;
use App\Models\QezetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Qezet extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = QezetModel::all();

        return view('back.mainpageinfo.qezet.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.qezet.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg|max:200',
            'image_1' => 'required|image|mimes:jpeg,png,jpg|max:200']);
        $data = new qezetModel;
        $data->header_id = $request->info;

        if ($request->hasFile('image', 'image_1')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();
            $qezetname = Str::random(5).'.'.$request->image_1->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imagename);
            $request->image_1->move(public_path('uploads'), $qezetname);
            $data->img = 'uploads/'.$imagename;
            $data->img_1 = 'uploads/'.$qezetname;
        }
        $data->save();

        return  redirect()->route('admin.qezet.index')->with(['success' => 'Məlumat əlavə olundu!']);
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
        $data = QezetModel::findOrFail($id);

        return view('back.mainpageinfo.qezet.update', compact('data', 'header'));
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
        $data = QezetModel::findOrFail($id);
        $data->header_id = $request->info;

        if ($request->hasFile('image', 'image_1')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();
            $qezetname = Str::random(5).'.'.$request->image_1->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imagename);
            $request->image_1->move(public_path('uploads'), $qezetname);
            $data->img = 'uploads/'.$imagename;
            $data->img_1 = 'uploads/'.$qezetname;
        }
        $data->update();

        return  redirect()->route('admin.qezet.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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
        $data = QezetModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.qezet.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }
}
