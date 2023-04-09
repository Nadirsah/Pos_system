<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoPostRequest;
use App\Models\SifarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Hesabat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = SifarisModel::where('sifaris', '=', 1)->get();

        return view('back.hesabat.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoPostRequest $request)
    {
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
    }

    public function filter(Request $request)
    {
        $fromdate = $request->input('fromdate');
        $todate = date('Y-m-d', strtotime($request->input('todate').' +1 day'));
        $data = SifarisModel::whereBetween('created_at', [$fromdate, $todate])
        ->where('sifaris', '=', 1)
             ->with(['getKategory', 'getMehsul'])
                        ->get();

        return response()->json($data);
    }

public function zet()
{
    $zet = DB::table('sifaris_models')
        ->join('mehsul_models', 'sifaris_models.price', '=', 'mehsul_models.id')
        ->where('sifaris', '=', 1)
        ->select('sifaris_models.*', 'mehsul_models.sale_price')
        ->sum('sale_price');

    $nagd = DB::table('sifaris_models')
    ->join('mehsul_models', 'sifaris_models.price', '=', 'mehsul_models.id')
    ->where('sifaris', '=', 1)
    ->where('odenis', '=', 'nagd')
    ->select(DB::raw('SUM(sifaris_models.miqdar * mehsul_models.sale_price) as total_nagd'))
    ->value('total_nagd');

    $kart = DB::table('sifaris_models')
    ->join('mehsul_models', 'sifaris_models.price', '=', 'mehsul_models.id')
    ->where('sifaris', '=', 1)
    ->where('odenis', '=', 'bank')
    ->select(DB::raw('SUM(sifaris_models.miqdar * mehsul_models.sale_price) as total_kart'))
    ->value('total_kart');

    return view('back.hesabat.zet', compact('zet', 'nagd', 'kart'));
}

public function zetfilter(Request $request)
{
    $fromdate = $request->input('fromdate');
    $todate = date('Y-m-d', strtotime($request->input('todate').' +1 day'));
    $data = SifarisModel::whereBetween('created_at', [$fromdate, $todate])
    ->where('sifaris', '=', 1)
    ->with('getMehsul')->get();

    $nagd = SifarisModel::whereBetween('created_at', [$fromdate, $todate])
    ->where('sifaris', '=', 1)
    ->where('odenis', '=', 'nagd')
    ->with('getMehsul')->get();

    $kart = SifarisModel::whereBetween('created_at', [$fromdate, $todate])
    ->where('sifaris', '=', 1)
    ->where('odenis', '=', 'bank')
    ->with('getMehsul')->get();

    $zet = [
        'all' => $data,
        'nagd' => $nagd,
        'kart' => $kart,
    ];

    return response()->json($zet);
}
}
