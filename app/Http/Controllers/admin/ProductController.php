<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\AttributeSize;
use App\Models\ProductAttribute;
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
        // $cate_res   =   Category::get();
        $cate_res = Category::where('parent_cat_id', null)->orderby('category_name', 'asc')->get();
        $tags       = ProductTag::get();
        $attr_size  = AttributeSize::get(); 
        return view('admin.add_product',compact('cate_res','tags','attr_size'));
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
        // dd($request->all());
        $request->validate([
            'category_id'       =>'required',
            'product_name'      =>'required',
            'pro_status'        =>'required',
            'attribute_name'    => 'required',
            'attr_tag'          => 'required',
            'product_price'     => 'required',
            'product_mrp'       => 'required',
            'product_qty'       => 'required',
            'product_image.*'   => 'mimes:jpeg,png,jpg,gif,svg|required',
            'gallery_image.*'   => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        // dd($request->all());

            if($request->hasFile('product_image')){
                $product_img        =   'productimg-'.rand(0,1).time().'.'.$request->product_image->extension();
                $destinationPath    = public_path().'/admin/pro_images' ;
                $request->product_image->move($destinationPath,$product_img);
            }
            if($request->hasFile('gallery_image')){
                $product_gal_img        =   array();
                foreach($request->gallery_image as $gal_img){
                    $img_name           =   'productgalimg-'.rand(0,1).time().'.'.$gal_img->extension();
                    $product_gal_img[]  =  $img_name; 
                    $destinationPath    = public_path().'/admin/pro_gal_img' ;
                    $gal_img->move($destinationPath,$img_name);
                }
            }
            $pro_data  =   Product::create([
                'category_id'=>$request->category_id,
                'product_name'=>$request->product_name,
                'pro_status'=>$request->pro_status,
                'tag_id'=>json_encode($request->tag_ids),
                'product_image'=>$product_img,
                'gallery_image' => isset($product_gal_img) ? json_encode($product_gal_img) : Null,
                'product_desc'=>$request->product_desc,
                'status'=>$request->pro_status,
            ]);
            // dd($pro_data);
            if($pro_data->id){
                $save_res   =   ProductAttribute::create([
                    'pro_id'=>$pro_data->id,
                    'attr_name'=>json_encode($request->attribute_name),
                    'attr_tag'=>json_encode($request->attr_tag),
                    'attr_price'=>json_encode($request->product_price),
                    'attr_mrp'=>json_encode($request->product_mrp),
                    'pro_qty'=>json_encode($request->product_qty),
                    'discount_type'=>json_encode($request->product_disc_type),
                    'discount_val'=>json_encode($request->product_desc),
                ]);
            }
            if($save_res){
                return redirect()->back()->with('toast_success', 'Product Successfully Added!');
            }else{
                return redirect()->back()->with('toast_error', 'Product not saved');
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
