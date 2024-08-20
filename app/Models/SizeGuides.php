<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizeGuides extends Model
{
    protected $fillable = [
        'sub_category_id',
        'guide_content',
    ];

    public $timestamps = false;

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}