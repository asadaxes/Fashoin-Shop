<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title'
    ];

    public $timestamps = false;

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}