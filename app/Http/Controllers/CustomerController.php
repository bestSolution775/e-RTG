<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;
use App\Customer;
use App\Country;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $distributors = Distributor::all();
        $countries = Country::all();
        $customers = Customer::all();
        return view("customers.index", compact('customers'), ['distributors'=>$distributors, 'countries'=>$countries, 'index'=>1]);
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
            'customer_company'=>'required',
            'address_line1'=>'required',
            'address_line2'=>'required',
            'state'=>'required',
            // 'ftphost'=>'required',
            // 'ftpusername'=>'required',
            // 'ftppassword'=>'required',
            'dbhost'=>'required',
            'dbuser'=>'required',
            'dbpassword'=>'required',
            'dbname'=>'required',
            'postcode'=>'required',
            'distributor_id'=>'required',
            'country_id'=>'required',
            'tag'=>'required'
        ]);

        if (!($request['id']))
        {  
            Customer::create($request->except("_token", "_method"));
            return redirect('/customers');
        }
        else
        {
            $country = Customer::find($request['id']);
            $country->update($request->except("_token", "_method"));
            return redirect('/customers');
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
        $country = Customer::find($id);
        $country->delete();
        return redirect('/customers');
    }
    public function search(Request $request)
    {
        $distributors = Distributor::all();
        $countries = Country::all();
        $customers = Customer::search($request['search'])->get();
        return view("customers.index", compact('customers'), ['distributors'=>$distributors, 'countries'=>$countries, 'index'=>1]);
    }
}
