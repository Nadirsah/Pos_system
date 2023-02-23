<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoPostRequest;
use App\Models\InfoModel;
use App\Models\PageModel;
use App\Models\HeaderModel;
use Illuminate\Support\Str;

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
        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg|max:200']);

        $data = new InfoModel;
        $data->page_id = $request->page_id;
        $data->name = $request->name;
        $data->content = $request->content;
        $data->price = $request->price;
        $data->color = $request->color;
        $data->brand = $request->brand;
        $data->slug = Str::slug($request->page);

        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);
            $data->image = 'uploads/'.$imagename;
        }
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
        $category = HeaderModel::all();
        $data = InfoModel::findOrFail($id);

        return view('back.info.infoupdate', compact('data', 'category'));
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
        $data->page_id = $request->info;
        $data->name = $request->name;
        $data->content = $request->content;
        $data->price = $request->price;
        $data->color = $request->color;
        $data->brand = $request->brand;
        $data->slug = Str::slug($request->page);

        if ($request->hasFile('image')) {
            $imagename = Str::random(5).'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $imagename);
            $data->image = 'uploads/'.$imagename;
        }
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
