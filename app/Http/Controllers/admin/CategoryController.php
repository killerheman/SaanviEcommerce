<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $save_res   =   Category::get();
        $categories = Category::where('parent_cat_id', null)->orderby('category_name', 'asc')->get();
        return view('admin.category',compact('save_res','categories'));
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
        // dd($request->all());
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories',
            'category_desc'=>'required',
            'parent_cat_id' => 'nullable|numeric',
            'category_img.*' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        

        if($request->hasFile('category_img')){
            $name='catimg-'.rand(0,9).time().'.'.$request->category_img->extension();
            $destinationPath    = public_path().'/admin/categoryfile' ;
            $request->category_img->move($destinationPath,$name);
        }
        $save_res   =   Category::create([
        'category_name'=>$request->category_name,
        'category_slug'=>$request->category_slug,
        'category_desc'=>$request->category_desc,
        'parent_cat_id'=>$request->parent_cat_id??null,
        'category_img'=>$name??'',
        ]);

        if($save_res){
            return redirect()->back()->with('toast_success', 'Product Category Successfully Added!');
            // return response()->json( 
            //     [
            //         'msg'=>'Product Category Successfully Added',
            //         'status'=>1
            //     ]
            // );
        }else{
            return redirect()->back()->with('toast_error', 'Product Category not saved');
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
        $category_data  =   Category::find($id);
        $categories = Category::where('parent_cat_id', null)->orderby('category_name', 'asc')->get();
        return view('admin.category',compact('category_data','categories'));
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
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required',
            'category_desc'=>'required',
            'parent_cat_id' => 'nullable|numeric',
            'category_img.*' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        dd($request->parent_cat_id);
        if($request->hasFile('category_img')){
            $name   =   'catimg-'.rand(0,9).time().'.'.$request->category_img->extension();
            $destinationPath    = public_path().'/admin/categoryfile' ;
            $request->category_img->move($destinationPath,$name);
        }elseif($request->hasFile('old_cat_img')){
            $name   =   $request->old_cat_img;
        }
        $cat_id_data = Category::find($id);
        $save_res   =   $cat_id_data->update([
        'category_name'=>$request->category_name,
        'category_slug'=>$request->category_slug,
        'category_desc'=>$request->category_desc,
        'parent_cat_id'=>$request->parent_cat_id??null,
        'category_img'=>$name??'',
        ]);

        if($save_res){
            if($request->hasFile('category_img')){
                unlink($destinationPath.'/'.$request->old_cat_img);
            }
            return redirect()->back()->with('toast_success', 'Product Category Successfully Update!');
        }else{
            return redirect()->back()->with('toast_error', 'Product Category not update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = Category::find($id)->delete();
       if($data){  
            return redirect()->back()->with('toast_success', 'Category deleted');  
       }else{
            return redirect()->back()->with('toast_error', 'Category not deleted');  
       }
    }
}
