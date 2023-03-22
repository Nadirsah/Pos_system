<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderModel;
use App\Models\InfoModel;
use App\Models\PageModel;
use App\Models\SifarisModel;
use Illuminate\Http\Request;

class Order extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            foreach ($request->inputs as $key => $value) {
                SifarisModel::create($value);
             }
                return response($value);
             
              
        }
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
    public function edit($masa_id)
    {   $data = SifarisModel::where('masa_id', $masa_id)
        ->where('sifaris', 0)
        ->get();
        $odenis=SifarisModel::where('masa_id', $masa_id)
        ->where('sifaris', 0)
        ->first();
        return view('back.print',compact('data','odenis'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
            $data = SifarisModel::find($id);
            $data->masa_id = $request->masa_id;
            $data->kategoriya = $request->kategoriya;
            $data->mehsul = $request->mehsul;
            $data->price = $request->price;
           
            $data->miqdar = $request->miqdar;
            $data->sifaris = $request->sifaris;
            $data->update();
           
            return redirect()->route('admin.panel');
    }

    public function print(Request $request)
{
    // $data = SifarisModel::where('masa_id', $request->id)->where('sifaris', 0)->first();
    // if ($data !== null) {
    //     $data->masa_id = $request->masa;
    //     $data->kategoriya = $request->kategoriya;
    //     $data->mehsul = $request->mehsul;
    //     $data->price = $request->qiymet;
    //     $data->sifaris = $request->sifaris;
    //     $data->update();
    //     return redirect()->route('admin.panel');
    // } else {
    //     return redirect()->back()->with('error', 'Kayıt bulunamadı!');
    // }
    SifarisModel::where('masa_id', $request->id)
    ->where('sifaris', 0)
    ->update([
        'masa_id' => $request->masa,
        'kategoriya' => $request->kategoriya,
        'mehsul' => $request->mehsul,
        'price' => $request->qiymet,
        'miqdar' => $request->miqdar,
        'sifaris' => $request->sifaris,
        'odenis' => $request->odenis
    ]);
    return redirect()->route('admin.panel');
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
}