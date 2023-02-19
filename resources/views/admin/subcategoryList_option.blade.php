<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}">{{$dash}}{{$subcategory->category_name}}</option>
    @if(count($subcategory->subcategory))
        @include('admin/subcategoryList_option',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach

