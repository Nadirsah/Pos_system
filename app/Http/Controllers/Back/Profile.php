<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class Profile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        return view('back.auth.profile', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.auth.creatprofil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

            'password' => 'required|min:5',

        ]);
        $data = new User;
        $data->name = $request->name;
        $data->role = $request->role;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('admin.profile.index')->with(['success' => 'Qeydiyyat tamamlandi!']);
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
        $data = User::findOrFail($id);

        return view('back.auth.editprofile', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

            'password' => 'required|min:5',
        ]);
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->password = Hash::make($request->password);
        $data->update();

        return redirect()->route('admin.profile.index')->with(['success' => 'Məlumat  yeniləndi!']);
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
        $data = User::findOrFail($id);

        $data->delete();

        return redirect()->route('admin.profile.index')->with(['success' => 'Məlumat uğurla silindi!']);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
        return back();
    }
}
