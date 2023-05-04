<?php $dash.='-- ';
?>
@foreach($subcategories as $subcategory)
    <option value="{{isset($category_data->parent_cat_id)?$category_data->parent_cat_id:$subcategory->id}}" {{isset($category_data->id)?($category_data->id==$subcategory->id?'selected':''):''}}>{{$dash}}{{$subcategory->category_name}}</option>
    @if(count($subcategory->subcategory) >= 1)
        @include('admin/subcategoryList_option',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach
