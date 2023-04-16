<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\SifarisModel;
use App\Models\AyarlarModel;
use Illuminate\Http\Request;
use App\Models\EndOrder;
use Illuminate\Support\Facades\DB;

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

            dd($value);
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
    {   $option=AyarlarModel::first();
        $data = SifarisModel::where('masa_id', $masa_id)
            ->where('sifaris', 0)
            ->get();
        $odenis = SifarisModel::where('masa_id', $masa_id)
        ->where('sifaris', 0)
        ->first();
     //   dd($data->toArray());

        return view('back.print', compact('data', 'odenis','option'));
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

    //    SifarisModel::where('masa_id', $request->masa_id)
    //        ->where('sifaris', 0)
    //        ->update([
    //            'masa_id' => $request->masa,
    //            'kategoriya' => $request->kategoriya,
    //            'mehsul' => $request->mehsul,
    //            'price' => $request->qiymet,
    //            'miqdar' => $request->miqdar,
    //            'sifaris' => $request->sifaris,
    //            'odenis' => $request->odenis,
    //        ]);

        foreach ($request->get('data') as $key => $data) {
           // dd($data,app(SifarisModel::class)->getFillable(), collect($data)->only(app(SifarisModel::class)->getFillable()));
            if(isset($data['id']) and isset($data['masa_id'])){
                SifarisModel::where([
                    'sifaris' => 0,
                    'id' => $data['id'],
                    'masa_id' => $data['masa_id'],
                ])->update(collect($data)->only(app(SifarisModel::class)->getFillable())->all());

                // $request->only(app(SifarisModel::class)->getFillable())
            }
         }
        
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