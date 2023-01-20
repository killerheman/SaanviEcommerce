@extends('admin.includes.master')
@section('title','Category')
@section('style')
@endsection

@section('main')
 <!--  BEGIN CONTENT AREA  -->
 <div id="" class="main-content mt-5">
    <div class="container">
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Category Form</h4>
                            </div>                                                                        
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                    <div class="col-md-4">
                                    <label for="category_name" class="col-md-4 col-form-label">Name</label>
                                    <input type="text" name='category_name' class="form-control" id="category_name">
                                    </div>

                                    <div class="col-md-4">
                                    <label for="category_slug" class="col-md-4 col-form-label">Slug</label>
                                        <input type="text" name='category_slug' class="form-control" id="category_slug">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="parent_category" class="col-form-label">Parent Category</label>
                                        <select class="form-control" name='parent_category' id="parent_category">
                                        <option value='' selected>Parent Category</option>
                                        <option value='Category1'>Category1</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="category_desc" class="col-sm-2 col-form-label">Description</label>
                                    <textarea name='category_desc' class="form-control" id="category_desc"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="category_img" class="col-form-label">Category Image</label>
                                    <input type="file" name='category_img' class="form-control" id="category_img">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Add New Category</button>
                                </div>
                            </div>
                        </form>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('script')
@endsection