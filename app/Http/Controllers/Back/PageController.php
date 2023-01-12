<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\PageModel;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PageModel::all();

        return view('back.pages.pages', compact('data'));
    }

         public function orders(Request $request)
         {
             foreach ($request->get('page') as $key => $order) {
                 PageModel::where('id', $order)->update(['orders' => $key]);
             }
         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.pagecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $pages = [$request->name];
        $count = PageModel::count('name');

        for ($i = 0; $i <= $count; $i++) {
            $data = new PageModel;
        }
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->orders = $i;
        $data->save();

        return redirect()->route('admin.page.create')->with(['success' => 'Səhifə əlavə olundu!']);
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
        $data = PageModel::findOrFail($id);

        return view('back.pages.pageupdate', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $data = PageModel::findOrFail($id);
        $data->name = $request->name;
        $data->update();

        return redirect()->route('admin.page.index')->with(['success' => 'Səhifə uğurla yeniləndi!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function delete($id)
    {
        $data = PageModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.page.index')->with(['success' => 'Səhifə uğurla silindi!']);
    }
}
