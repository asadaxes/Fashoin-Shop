<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'details',
        'care',
        'materials',
        'measurement',
        'sale_price',
        'regular_price',
        'variants',
        'sub_category_id'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function cart_data(): string
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'sale_price' => $this->sale_price,
            'regular_price' => $this->regular_price,
            'sub_category' => $this->subCategory,
            'variant' => $this->variants
        ];

        return json_encode($data);
    }
}