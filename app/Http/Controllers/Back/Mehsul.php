<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoPostRequest;
use App\Models\KategoriyaModel;
use App\Models\Masamodel;
use App\Models\MehsulModel;

class Mehsul extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = MehsulModel::all();

        return view('back.mehsul.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = KategoriyaModel::all();

        return view('back.mehsul.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoPostRequest $request)
    {
        $data = new MehsulModel;
        $data->page_id = $request->page_id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->sale_price = $request->sale_price;

        $data->save();
        if ($data) {
            return  redirect()->route('admin.mehsul.index')->with(['success' => 'Səhifə əlavə olundu!']);
        }

        return  redirect()->back()->with(['error' => 'Səhifə əlavə olundu!']);
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
        $page = Masamodel::all();
        $category = KategoriyaModel::all();
        $data = MehsulModel::findOrFail($id);

        return view('back.mehsul.update', compact('data', 'category', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoPostRequest $request, $id)
    {
        $data = MehsulModel::findOrFail($id);
        $data->page_id = $request->page_id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->sale_price = $request->sale_price;
        $data->update();

        return  redirect()->route('admin.mehsul.index')->with(['success' => 'Səhifə uğurla yeniləndi!']);
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
        $data = MehsulModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.mehsul.index')->with(['success' => 'Səhifə uğurla silindi!']);
    }
}
