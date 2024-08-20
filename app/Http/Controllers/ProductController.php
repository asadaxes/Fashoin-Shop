<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use App\Models\Products;

class ProductController extends Controller
{
    public function category($category)
    {
        try {
            $category = Str::lower($category);
            $subCategory = SubCategory::whereRaw('LOWER(title) LIKE ?', [$category])->firstOrFail();
            $products = Products::where('sub_category_id', $subCategory->id)->paginate(30);
            $data = [
                'active_page' => 'products',
                'sub_category' => $subCategory,
                'products' => $products
            ];
            return view('products.category', $data);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home');
        }
    }

    public function product_view($product)
    {
        try {
            $product = Products::where('slug', $product)->first();
            $relevant_products = Products::where('sub_category_id', $product->sub_category_id)->take(10)->get();
            $data = [
                'active_page' => 'products',
                'product' => $product,
                'relevant_products' => $relevant_products
            ];
            return view('products.product_view', $data);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home');
        }
    }

    public function cart()
    {
        return view('products.cart');
    }
}