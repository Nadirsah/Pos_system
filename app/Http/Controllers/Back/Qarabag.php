<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderModel;
use App\Models\QarabagModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Qarabag extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = QarabagModel::all();

        return view('back.mainpageinfo.qarabag.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.qarabag.create', compact('header'));
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
        $data = new QarabagModel;
        $data->header_id = $request->info;
        $data->name = $request->name;
        $data->title = $request->title;
        $data->content = $request->content;

        if ($request->hasFile('image', 'slide_fon')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();
            $slide_fon = Str::random(5).'.'.$request->slide_fon->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imagename);
            $request->slide_fon->move(public_path('uploads'), $slide_fon);
            $data->img = 'uploads/'.$imagename;
            $data->slide_fon = 'uploads/'.$slide_fon;
        }
        $data->save();

        return  redirect()->route('admin.qarabag.index');
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
        $data = QarabagModel::findOrFail($id);

        return view('back.mainpageinfo.qarabag.update', compact('data', 'header'));
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
        $data = QarabagModel::findOrFail($id);
        $data->header_id = $request->info;
        $data->name = $request->name;
        $data->title = $request->title;
        $data->content = $request->content;

        if ($request->hasFile('image', 'slide_fon')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();
            $slide_fon = Str::random(5).'.'.$request->slide_fon->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imagename);
            $request->slide_fon->move(public_path('uploads'), $slide_fon);
            $data->img = 'uploads/'.$imagename;
            $data->slide_fon = 'uploads/'.$slide_fon;
        }
        $data->update();

        return  redirect()->route('admin.qarabag.index');
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
        $data = QarabagModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.qarabag.index');
    }
}
