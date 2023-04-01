<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_res   =   Category::get();
        return view('admin.add_product',compact('cate_res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        // dd($request);
        $request->validate([
            'category_id'=>'nullable',
            'product_name'=>'required',
            'pro_status'=>'required',
            'tag_name' => 'nullable',
            'tag_color' => 'nullable',
            'text_color' => 'nullable',
            'attribute_name' => 'nullable',
            'product_color' => 'nullable',
            'product_price' => 'required',
            'product_mrp' => 'required',
            'product_qty' => 'required',
            'product_disc_type' => 'nullable',
            'product_disc_val' => 'nullable',
            'product_desc' => 'nullable',
            'product_image.*' => 'mimes:jpeg,png,jpg,gif,svg',
            'gallery_image.*' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $inserted_tagid   =   ProductTag::insertGetId([
            'tag_name' => json_encode($request->tag_name),
            'tag_color' => json_encode($request->tag_color),
            'text_color' => json_encode($request->text_color),
        ]);
        dd($inserted_tagid);
        // dd($request->all());
        if($request->hasFile('product_image') OR $request->hasFile('gallery_image')){

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
    }
}
