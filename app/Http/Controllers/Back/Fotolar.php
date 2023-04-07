<?php

namespace App\Http\Controllers\Back;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FotoPostRequest;
use App\Models\FotoModel;
use App\Models\HeaderModel;
use App\Models\InfoModel;
use App\Models\PageModel;
use App\Models\SifarisModel;
use Illuminate\Http\Request;

class Fotolar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = SifarisModel::where('sifaris', '=', 1)->get();

        return view('back.mainpageinfo.hesabat.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.hesabat.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoPostRequest $request)
    {
        $data = new FotoModel;

        $data->name = $request->name;

        $data->save();

        return  redirect()->route('admin.fotolar.index')->with(['success' => 'Məlumat əlavə olundu!']);
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
        $header = HeaderModel::all();
        $data = FotoModel::findOrFail($id);

        return view('back.mainpageinfo.hesabat.update', compact('data', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FotoPostRequest $request, $id)
    {
        $data = FotoModel::findOrFail($id);

        $data->name = $request->name;

        $data->update();

        return  redirect()->route('admin.fotolar.index')->with(['success' => 'Məlumat uğurla yeniləndi!']);
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
        $data = FotoModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.fotolar.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }

    

    public function filter(Request $request)
    {
        $fromdate = $request->input('fromdate');
        $todate = date('Y-m-d', strtotime($request->input('todate') . ' +1 day'));
        $data = SifarisModel::whereBetween('created_at', [$fromdate,$todate])
        ->where('sifaris', '=', 1)
             ->with(['getKategory', 'getMehsul'])
                        ->get();

        return response()->json($data);
    }
public function zet()

{   $zet = DB::table('sifaris_models')
    ->join('info_models', 'sifaris_models.price', '=', 'info_models.id')
    ->where('sifaris', '=', 1)
    ->select('sifaris_models.*', 'info_models.sale_price')
    ->sum('sale_price');
    
    $nagd = DB::table('sifaris_models')
    ->join('info_models', 'sifaris_models.price', '=', 'info_models.id')
    ->where('sifaris', '=', 1)
    ->where('odenis','=','nagd')
    ->select(DB::raw('SUM(sifaris_models.miqdar * info_models.sale_price) as total_nagd'))
    ->value('total_nagd');
    


    $kart = DB::table('sifaris_models')
    ->join('info_models', 'sifaris_models.price', '=', 'info_models.id')
    ->where('sifaris', '=', 1)
    ->where('odenis','=','bank')
    ->select(DB::raw('SUM(sifaris_models.miqdar * info_models.sale_price) as total_kart'))
    ->value('total_kart');

    

     return view('back.mainpageinfo.hesabat.zet',compact('zet','nagd','kart'));
}

public function zetfilter(Request $request)
    {
        $fromdate = $request->input('fromdate');
        $todate = date('Y-m-d', strtotime($request->input('todate') . ' +1 day'));
        $data = SifarisModel::whereBetween('created_at', [$fromdate,$todate])
        ->where('sifaris', '=', 1)
        ->with('getMehsul')->get();

        $nagd = SifarisModel::whereBetween('created_at', [$fromdate,$todate])
        ->where('sifaris', '=', 1)
        ->where('odenis','=','nagd')
        ->with('getMehsul')->get();

        $kart = SifarisModel::whereBetween('created_at', [$fromdate,$todate])
        ->where('sifaris', '=', 1)
        ->where('odenis','=','bank')
        ->with('getMehsul')->get();

        $zet = [
            'all' => $data,
            'nagd' => $nagd,
            'kart' => $kart
        ];

        return response()->json($zet);
    }



}