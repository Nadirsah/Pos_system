<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\HeaderModel;
use App\Models\NaxcivanModel;
use Illuminate\Http\Request;

class Naxcivan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = NaxcivanModel::all();

        return view('back.mainpageinfo.naxcivan.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $header = HeaderModel::all();

        return view('back.mainpageinfo.naxcivan.create', compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new NaxcivanModel;
        $data->header_id = $request->info;
        $data->title = $request->title;
        $data->city = $request->city;
        $data->area = $request->area;
        $data->people = $request->people;
        $data->city_text = $request->city_text;
        $data->area_text = $request->area_text;
        $data->people_text = $request->people_text;
        if ($request->hasFile('image')) {
            $cityimage = ($request->city).'.'.$request->city_image->getClientOriginalExtension();
            $areaimage = ($request->area).'.'.$request->area_image->getClientOriginalExtension();
            $peopleimage = ($request->people).'.'.$request->people_image->getClientOriginalExtension();
            $request->city_image->move(public_path('uploads'), $cityimage);
            $request->area_image->move(public_path('uploads'), $areaimage);
            $request->people_image->move(public_path('uploads'), $peopleimage);
            $data->city_image = 'uploads/'.$cityimage;
            $data->area_image = 'uploads/'.$areaimage;
            $data->people_image = 'uploads/'.$peopleimage;
        }
        $data->save();

        return  redirect()->route('admin.naxcivan.index');
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
        $data = NaxcivanModel::findOrFail($id);

        return view('back.mainpageinfo.naxcivan.update', compact('data', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

        ]);
        $data = NaxcivanModel::finOrFail($id);
        $data->header_id = $request->info;
        $data->title = $request->title;
        $data->city = $request->city;
        $data->area = $request->area;
        $data->people = $request->people;
        $data->city_text = $request->city_text;
        $data->area_text = $request->area_text;
        $data->people_text = $request->people_text;

        if ($request->hasFile('image')) {
            $cityimage = ($request->city).'.'.$request->city->getClientOriginalExtension();
            $areaimage = ($request->area).'.'.$request->area->getClientOriginalExtension();
            $peopleimage = ($request->people).'.'.$request->people->getClientOriginalExtension();

            $request->city->move(public_path('uploads'), $cityimage);
            $request->area->move(public_path('uploads'), $areaimage);
            $request->people->move(public_path('uploads'), $peopleimage);
            $data->city_image = 'uploads/'.$cityimage;
            $data->area_image = 'uploads/'.$areaimage;
            $data->people_image = 'uploads/'.$peopleimage;
        }
        $data->update();

        return  redirect()->route('admin.esasinfo.index');
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
        $data = NaxcivanModel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.naxcivan.index');
    }
}
