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
            $request->category_img->storeAs('public/categoryfile',$name);
            $path='categoryfile/'.$name;
        }
        $save_res   =   Category::create([
        'category_name'=>$request->category_name,
        'category_slug'=>$request->category_slug,
        'category_desc'=>$request->category_desc,
        'parent_cat_id'=>$request->parent_cat_id??null,
        'category_img'=>$path??'',
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
       $data = Category::find($id)->delete();
       if($data){  
            return redirect()->back()->with('toast_success', 'Category deleted');  
       }else{
            return redirect()->back()->with('toast_error', 'Category not deleted');  
       }
    }
}
