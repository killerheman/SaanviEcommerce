@extends('admin.includes.master')
@section('title','Category')
@section('style')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin/src/plugins/src/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/src/plugins/css/light/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
<!-- END PAGE LEVEL STYLES -->

@endsection

@section('main')
<!--  BEGIN CONTENT AREA  -->
<div id="" class="main-content mt-5">
    <div class="container">
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing ">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{isset($category_data)?'Category Update Form':'Category Form'}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area p-5">
                        <form action="{{isset($category_data)?route('category.update', $category_data->id):route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($category_data)
                            @method('PUT')
                            @endisset
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="category_name" class="col-md-4 col-form-label">Name</label>
                                    <input type="text" name='category_name' class="form-control" id="category_name" value="{{isset($category_data->category_name)?$category_data->category_name:''}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="category_slug" class="col-md-4 col-form-label">Slug</label>
                                    <input type="text" name='category_slug' class="form-control" id="category_slug" value="{{isset($category_data->category_slug)?$category_data->category_slug:''}}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="parent_cat_id" class="col-form-label">Parent Category</label>
                                    <select type="text" name="parent_cat_id" id="parent_cat_id" class="form-control">
                                        <option disabled hidden selected>None</option>
                                        @if($categories)
                                        @foreach($categories as $category)
                                        <?php $dash = ''; ?>
                                        <option value="{{$category->id}}" {{isset($category_data->id)?($category_data->id==$category->id?"selected":''):''}}>{{$category->category_name}}</option>
                                        @if(count($category->subcategory)>=1)
                                        @include('admin/subcategoryList_option',['subcategories' => $category->subcategory])
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="category_img" class="col-form-label">Category Image</label>
                                    <input type="file" name='category_img' class="form-control" id="category_img">
                                    @isset($category_data->category_img)
                                        <input type="hidden" name='old_cat_img' value='{{$category_data->category_img}}' class="form-control">
                                        <img alt="catimg" class="img-fluid rounded-circle" src="{{ url('admin/categoryfile/'.$category_data->category_img ) }}" height='50px' width='50px'>
                                    @endisset
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="editor" class="col-sm-2 col-form-label">Description</label>
                                    <textarea name='category_desc' class="form-control" id="editor">{{isset($category_data->category_desc)?$category_data->category_desc:''}}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" id="save_category" class="btn btn-primary mt-5">{{isset($category_data)?'Update Category':'Add New Category'}}</button>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Datatables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Striped</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category Image</th>
                                    <th>Category</th>
                                    <th>Parent Category</th>
                                    <th>Category Slug</th>
                                    <th>Category Description</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)

                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame me-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{ url('admin/categoryfile/'.$item->category_img ) }}">
                                            </div>

                                        </div>
                                    </td>

                                    <td>{{$item->category_name}} </td>
                                    <td>none</td>
                                    <td>{{$item->category_slug??''}}</td>
                                    <td>{{$item->category_desc??''}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-success">Edit</a>
                                        <form action="{{route('category.destroy',$item->id)}}" onsubmit="return confirm('Are you sure?');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning" type="submit">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                <?php $dash = ''; ?>
                                @if(count($item->subcategory)>=1)
                                @include('admin/subCategoryList',['subcategories' => $item->subcategory])
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Category Image</th>
                                    <th>Category</th>
                                    <th>Parent Category</th>
                                    <th>Category Slug</th>
                                    <th>Category Description</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  --}}
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin/src/plugins/src/table/datatable/datatables.js')}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
        <script>
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                
                placeholder: 'product category description',
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
               
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                htmlEmbed: {
                    showPreviews: true
                },
                
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType
                    'MathType'
                ]
            });
        </script>
<script>
    //     $(document).ready(function () {

    //    $('#category-form').on('submit',function(e){
    //     e.preventDefault();
    //     var nurl="{{route('category.store')}}";
    //     $.ajax({
    //         url:nurl,
    //         dataType: 'JSON',
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         method:'post',
    //         data:new FormData(this),
    //         success:function(response){
    //             toastr.options =
    //             {
    //                 "closeButton" : true,
    //                 "progressBar" : true
    //             }
    //                 toastr.success(response.msg);
    //                 $("#category-form").trigger("reset");
    //         },
    //         error:function(data){
    //             toastr.options =
    //             {
    //                 "closeButton" : true,
    //                 "progressBar" : true
    //             }
    //             var response = JSON.parse(data.responseText);
    //             $.each( response.errors, function( key, value) {
    //                 toastr.warning(value);
    //             });

    //         }
    //     });
    //    })
    // });

    /**
     * Data Table on Category page 
     * */
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10
    });
</script>

@endsection