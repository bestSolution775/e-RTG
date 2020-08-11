<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::where('parent_id', '=', 0)->get();
        $parent = Category::where('title','Parent')->get();
        $catego = Category::where('id', $parent[0]['id'])->orWhere('parent_id', $parent[0]['id'])->get();
        $cat1 = [];
        for($i=0;$i < count($catego);$i++)
        {
            $cat1[$i] = $catego[$i]->id;
        }
        $allCategories = array_fill_keys($cat1,'');
        $j=0;
        foreach($allCategories as &$value)
        { 
            $value =  $catego[$j]->title;
            $j++;
        }
        return view("/products/categories/index", compact('categories','allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
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
            // $exist_parent = Category::where('parent_id',$input['parent_id'])->get();
            if($input['parent_id']==0){
                return back()->with('Failed', 'the category can"t be added. please select the parent');
            }
            Category::create($input);
            return back()->with('success', 'New Category added successfully');
        }
        else{
            $category = Category::find($request['id']);
            $category->update($request->except("_token", "_method"));
            return redirect('/categories');
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
        $category = Category::find($id);
        if($category['title'] != 'Parent'){
            $subcategory = Category::where("parent_id", $id)->get();
            if(count($subcategory)>0){
                return \Response::json(['success'=>'failed']);
            }
            else{
                $category->delete();
                return \Response::json(['success'=>'Ok']);
            }
        }
        return \Response::json(['success'=>'failed']);
    }
}
