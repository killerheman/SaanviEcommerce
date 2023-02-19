<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'parent_cat_id',
        'category_name',
        'category_slug',
        'category_desc',
        'category_img',
    ];
    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_cat_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_cat_id');
    }
}
