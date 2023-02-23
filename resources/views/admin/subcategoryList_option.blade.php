<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" {{isset($category_data->id)?($category_data->id==$subcategory->id?'selected':''):''}}>{{$dash}}{{$subcategory->category_name}}</option>
    @if(count($subcategory->subcategory))
        @include('admin/subcategoryList_option',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach

