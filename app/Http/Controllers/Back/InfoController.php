<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoPostRequest;
use App\Models\HeaderModel;
use App\Models\InfoModel;
use App\Models\PageModel;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = InfoModel::all();

        return view('back.info.info', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = HeaderModel::all();

        return view('back.info.infocreate', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoPostRequest $request)
    {
        $data = new InfoModel;
        $data->page_id = $request->page_id;
        $data->name = $request->name;
        $data->price = $request->price;
        
        $data->save();
        if ($data) {
            return  redirect()->route('admin.info.index')->with(['success' => 'Səhifə əlavə olundu!']);
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
        $page = PageModel::all();
        $category = HeaderModel::all();
        $data = InfoModel::findOrFail($id);

        return view('back.info.infoupdate', compact('data', 'category', 'page'));
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
        $data = InfoModel::findOrFail($id);
        $data->page_id = $request->page_id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->update();

        return  redirect()->route('admin.info.index')->with(['success' => 'Səhifə uğurla yeniləndi!']);
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
        $data = InfoModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.info.index')->with(['success' => 'Səhifə uğurla silindi!']);
    }
}
