<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderPostRequest;
use App\Models\HeaderModel;
use Illuminate\Support\Str;

class HomeHeader extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HeaderModel::all();

        return view('back.mainpage.header', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.mainpage.headercreat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeaderPostRequest $request)
    {
        $data = new HeaderModel;
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->save();

        return redirect()->route('admin.header.create')->with(['success' => 'Məlumat əlavə olundu!']);
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
        $data = HeaderModel::findOrFail($id);

        return view('back.mainpage.headerupdate', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HeaderPostRequest $request, $id)
    {
        $data = HeaderModel::findOrFail($id);
        $data->name = $request->name;
        $data->update();

        return redirect()->route('admin.header.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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
        $data = HeaderModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.header.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }
}
