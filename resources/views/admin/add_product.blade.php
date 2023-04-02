@extends('admin.includes.master')
@section('title','Product Form')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection
@section('main')
<!--  BEGIN CONTENT AREA  -->
<div id="" class="main-content">
    <div class="container">
        <div class="container">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Show Produts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="row layout-top-spacing">
                <div id="basic" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add new product</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product_name">Product Category</label>
                                        <div class="form-group">
                                            <select class="js-example-basic-multiple-limit form-select" name="category_id">
                                                @isset($cate_res)
                                                @foreach($cate_res as $category)
                                                @php $dash = ''; @endphp
                                                <option value="{{$category->id}}" {{isset($category_data->id)?($category_data->id==$category->id?"selected":''):''}}>{{$category->category_name}}</option>
                                                @if(count($category->subcategory))
                                                @include('admin/subcategoryList_option',['subcategories' => $category->subcategory])
                                                @endif
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input id="product_name" type="text" name="product_name" placeholder="Product name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="product_image">Product Image</label>
                                            <input id="product_image" type="file" name="product_image" placeholder="Product image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="gallery_image">Gallery Image</label>
                                            <input id="gallery_image" type="file" name="gallery_image[]" multiple placeholder="Product image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 ">
                                        <label for="product_status">Product Status</label>
                                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="pro_status">
                                            <option selected disabled>Select Product Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inacctive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row col-md-12" id="tags">
                                            <label for="tag_ids">tag Name</label>
                                            <select class="form-select js-example-basic-multiple-limit" data-placeholder="Select Tags" aria-label="Default select example" multiple name="tag_ids[]">
                                                @foreach($tags as $td)
                                                <option value="{{$td->id ?? ''}}">{{$td->tag_name ??'' }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-3" id="attribute">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_attributes">Attributes</label>
                                            <select class="form-select form-select-md mb-3 attribute_name" name="attribute_name[]" aria-label=".form-select-lg example">
                                                <option value="color" selected>Color</option>
                                                <option value="size">Size</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 attr_size_color">
                                        <div class="form-group">
                                            <label for="attr_tag">Color</label>
                                            <input id="attr_tag" type="color" name="attr_tag[]" placeholder="Product color" class="form-control" style="height:50px;">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_price">Price</label>
                                            <input id="product_price" type="text" name="product_price[]" placeholder="Product Price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_mrp">MRP</label>
                                            <input id="product_mrp" type="text" name="product_mrp[]" placeholder="Product MRP" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_qty">QTY</label>
                                            <input id="product_qty" type="text" name="product_qty[]" placeholder="Product QTY" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_disc_type">Discount Type</label>
                                            <select class="form-select form-select-md mb-3" name="product_disc_type[]" aria-label=".form-select-lg example" id="product_disc_type">
                                                <option value="percentage" selected>Percentage</option>
                                                <option value="flat">Flat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_disc_val">Discount Value</label>
                                            <input id="product_disc_val" type="text" name="product_disc_val[]" placeholder="Discount Value" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1 pt-3">
                                        <div class="form-group mt-3">
                                            <input type="button" value="+" class="add_more btn btn-primary" id="addattri">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="editor" class="col-sm-2 col-form-label">Description</label>
                                        <textarea name='product_desc' class="form-control" id="editor"></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="mt-4 btn btn-primary">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
</div>
</div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
<!-- For category Multiselect code js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Denotes total number of rows
        // var rowIdx = 1;
        /**Onchange attribute color sizze */
        $(document).on('change','.attribute_name',function(e) {
            var attr_val = $(this).val();
            // alert(attr_color);
            // alert(attr_val);
            var type_id=$(this).closest('.row');
            // alert(type_id);
            if (attr_val == "size") {
                type_id.children(".attr_size_color").html('<div class="form-group"><label for="attribute_size">Select Size</label><select class="form-select form-select-md" name="attr_tag[]" aria-label=".form-select-lg example" id="attribute_size"> <option selected disabled>Select attribute</option>@foreach($attr_size as $attr_size){<option value="{{$attr_size->id ?? ""}}">{{$attr_size->size ?? ""}}</option>@endforeach </select></div>');
            } else if (attr_val == "color") {
                type_id.children(".attr_size_color").html('<div class="form-group"><label for="product_color">Color</label> <input id="product_color" type="color" name="attr_tag[]" placeholder="Product color" class="form-control" style="height:50px;"></div>');
            }

        });

        // jQuery button click event to add a row attribute
        $('#addattri').on('click', function() {

            // Adding a row inside the tbody.
            $(`<div class="row mt-3" id="attribute"> <div class="col-md-2"> <div class="form-group"> <label for="product_attributes">Attributes</label> <select class="form-select form-select-md mb-3 attribute_name" name="attribute_name[]" aria-label=".form-select-lg example" > <option value="color" selected>Color</option> <option value="size">Size</option> </select> </div> </div> <div class="col-md-2 attr_size_color"> <div class="form-group"> <label for="product_color">Color</label> <input id="product_color" type="color" name="attr_tag[]" placeholder="Product color" class="form-control" style="height:50px;"> </div> </div> <div class="col-md-2"> <div class="form-group"> <label for="product_price">Price</label> <input id="product_price" type="text" name="product_price[]" placeholder="Product Price" class="form-control"> </div> </div> <div class="col-md-2"> <div class="form-group"> <label for="product_mrp">MRP</label> <input id="product_mrp" type="text" name="product_mrp[]" placeholder="Product MRP" class="form-control"> </div> </div> <div class="col-md-2"> <div class="form-group"> <label for="product_qty">QTY</label> <input id="product_qty" type="text" name="product_qty[]" placeholder="Product QTY" class="form-control"> </div> </div> <div class="col-md-2"> <div class="form-group"> <label for="product_disc_type">Discount Type</label> <select class="form-select form-select-md mb-3" name="product_disc_type[]" aria-label=".form-select-lg example" id="product_disc_type"> <option value="percentage" selected>Percentage</option> <option value="flat">Flat</option> </select> </div> </div> <div class="col-md-2"> <div class="form-group"> <label for="product_disc_val">Discount Value</label> <input id="product_disc_val" type="text" name="product_disc_val[]" placeholder="Discount Value" class="form-control"> </div> </div><div class="col-md-2 pt-3"> <div class="form-group mt-3"> <input type="button" value="❌" class="btn btn-danger" onclick="removefun()" id="remove"> </div> </div> </div>`).insertAfter("#attribute");
            // rowIdx++;
        });

        $(".js-example-basic-multiple-limit").select2({
            placeholder:'selecet tags',
        });

    });

    //removing attribute
    function removefun() {
        // alert('hii');
        $('#remove').closest('.row').remove();
    }
    //removing Tags
    function removetags() {
        $('#remove').closest('#tags').remove();
    }


    // CK editor code 
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
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
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },

        placeholder: 'product description',

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
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },

        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
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
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
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
@endsection