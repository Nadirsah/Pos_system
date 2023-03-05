<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\PageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                 DB::table('page_models')->where('id', $order)->update(['orders' => $key]);
             }

             return redirect()->back()->with(['success' => 'Səhifə əlavə olundu!']);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*name' => 'reuqired',
            'inputs.*orders' => 'reuqired',
        ]);
        $data = new Pagemodel;
        $data->name = $request->name;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
