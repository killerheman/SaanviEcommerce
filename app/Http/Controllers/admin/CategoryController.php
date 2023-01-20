<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category');
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
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required',
            'category_desc'=>'required',
            'category_img.*' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('category_img')){
            $name='catimg-'.rand(0,9).time().'.'.$request->category_img->extension();
            $request->category_img->storeAs('public/categoryfile',$name);
            $path='public/categoryfile/'.$name;
        }
        Category::create([
        'category_name'=>$request->category_name,
        'category_slug'=>$request->category_slug,
        'category_desc'=>$request->category_desc,
        'parent_category'=>$request->parent_category??'null',
        'category_img'=>$path??'null',
        ]);
       return redirect()->back()->with('success','Category created Successfully !');
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
    }
}
