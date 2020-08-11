<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use Illuminate\Http\Response;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attributes = Attribute::where('parent_id', '=', 0)->get();
        $parent = Attribute::where('title','Parent')->get();
        $attr = Attribute::where('id', $parent[0]['id'])->orWhere('parent_id', $parent[0]['id'])->get();
        $cat1 = [];
        for($i=0;$i < count($attr);$i++)
        {
            $cat1[$i] = $attr[$i]->id;
        }
        $allAttributes = array_fill_keys($cat1,'');
        $j=0;
        foreach($allAttributes as &$value)
        { 
            $value =  $attr[$j]->title;
            $j++;
        }
        return view("/products/attributes/index", compact('attributes','allAttributes'));
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
        $this->validate($request,[
            'title' => 'required',
        ]);
        if(!$request['id']){
            $input = $request->all();
            $input['parent_id'] = empty($input['parent_id']) ?  0 : $input['parent_id'];
            // $exist_parent = Attribute::where('parent_id',$input['parent_id'])->get();
            if($input['parent_id']==0){
                return back()->with('Failed', 'the category can"t be added. please select the parent');
            }

            Attribute::create($input);
            return back()->with('success', 'New Category added successfully');
        }
        else{
            $attribute = Attribute::find($request['id']);
            $attribute->update($request->except("_token", "_method"));
            return redirect('/attributes');
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
        $attribute = Attribute::find($id);
        if($attribute['title'] != 'Parent'){
            $subattribute = Attribute::where("parent_id", $id)->get();
            if(count($subattribute)>0){
                return \Response::json(['success'=>'failed']);
            }
            else{
                $attribute->delete();
                return \Response::json(['success'=>'Ok']);
            }
        }
        return \Response::json(['success'=>'failed']);
    }
}
