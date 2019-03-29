<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BrandRequest;
use DB;
use Session;
use Abraham\TwitterOAuth\TwitterOAuth;
use Storage;
use Validator;
use App\brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = DB::table('brands')->select('id','brand', 'username')->get();
        return view('brand.master',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $data = brand::create($input);
        alert()->success('Data Brand berhasil ditambah','Berhasil')->persistent('Oke');
        return redirect('brand');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::where('id',$id)->get();
        return view ('brand.edit',compact('brand'));

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
        $brand = brand::where('id', '=' ,$id)->first();
        $input = $request->all();
        $brand->update($input);
        alert()->success('Data Brand berhasil diedit','Berhasil')->persistent('Oke');
        return redirect('brand');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = DB::table('brands')->where('id',$id)->delete();
        alert()->success('Data Brand berhasil dihapus','Berhasil')->persistent('Oke');
        return redirect('brand');
    }
}
