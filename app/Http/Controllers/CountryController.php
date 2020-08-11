<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Distributor;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::all();
        return view('countries.index', compact('countries'), ['index'=>1]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'country_title'=>'required',
            'country_code'=>'required'
        ]);
        if (!($request['id']))
        {   
            country::create($request->except("_token","_method"));
            return redirect('/countries');
        }
        else
        {
            $country = Country::find($request['id']);
            $country->update($request->except("_token","_method"));
            return redirect('/countries');
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
    public function edit($id)
    {
        //
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
        $exist_distributor = DB::table('distributors')->where('country_id', $id)->first();
        $exist_customer = DB::table('customers')->where('country_id', $id)->first();
        if($exist_distributor || $exist_customer)
        {
            return redirect('/countries');
        }
        else 
        {
            $country = Country::find($id);
            $country->delete();
            return redirect('/countries');
        }
    }
}