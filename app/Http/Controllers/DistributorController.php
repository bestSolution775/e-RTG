<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Distributor;
use App\Customer;
use Illuminate\Support\Facades\DB;
class DistributorController extends Controller
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
        $distributors = Distributor::all();
        return view('distributors.index', compact('distributors'), ['countries'=>$countries,'index'=>1]);
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
            'distributor_company'=>'required',
            'address_line1'=>'required',
            'address_line2'=>'required',
            'state'=>'required',
            'postcode'=>'required',
            'country_id'=>'required'
        ]);
        if (!($request['id']))
        {   
            Distributor::create($request->except("_token","_method"));
            return redirect('/distributors');
        }
        else
        {
            $country = Distributor::find($request['id']);
            $country->update($request->except("_token", "_method"));
            return redirect('/distributors');
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
        //
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
        $exist_distributor = Customer::where('distributor_id', $id)->get();

        if(count($exist_distributor)>0)
        {
            return back()->withFailed(__('The Disritubor can"t be removed'));
        }
        else{
            $country = Distributor::find($id);
            $country->delete();
            return back()->withStatus(__('Profile successfully updated.'));
        }
    }

    public function search(Request $request){
        $countries = Country::all();
        $distributors = Distributor::search($request['search'])->get();
        return view('distributors.index', compact('distributors'), ['countries'=>$countries,'index'=>1]);
    }
}
