<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderPostRequest;
use App\Models\KategoriyaModel;
use Illuminate\Support\Str;

class Kategoriya extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KategoriyaModel::all();

        return view('back.kategoriya.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kategoriya.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeaderPostRequest $request)
    {
        $data = new KategoriyaModel;
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->save();

        return redirect()->route('admin.kategoriya.index')->with(['success' => 'Məlumat əlavə olundu!']);
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
        $data = KategoriyaModel::findOrFail($id);

        return view('back.kategoriya.update', compact('data'));
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
        $data = KategoriyaModel::findOrFail($id);
        $data->name = $request->name;
        $data->update();

        return redirect()->route('admin.kategoriya.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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
        $data = KategoriyaModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.kategoriya.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }
}
