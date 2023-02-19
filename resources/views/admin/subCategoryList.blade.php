<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
        <tr>
            <td>
                <div class="d-flex">                                                        
                    <div class="usr-img-frame me-2 rounded-circle">
                        <img alt="avatar" class="img-fluid rounded-circle" src="{{asset('storage/'.$item->category_img) }}">
                    </div>
                    {{-- <p class="align-self-center mb-0 admin-name"> Tiger </p> --}}
                </div>
            </td>
            <td>{{$dash}}{{$subcategory->category_name}}</td>
            <td>{{$item->category_name}}</td>
            <td>{{$subcategory->category_slug??''}}</td>
            <td> {{$subcategory->category_desc??''}}</td>
            <td>
                <button type="button" class="btn btn-success">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
	    @if(count($subcategory->subcategory))
            @include('admin/subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
        </tr>
@endforeach