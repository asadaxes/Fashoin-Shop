<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use App\Models\Products;


class ProductsInventory extends Controller
{
    public function products_list(Request $request)
    {
        $query = Products::query();
        $searchTerm = $request->input('search');
        $query->when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('price', 'like', '%' . $searchTerm . '%')
                ->orWhereJsonContains('variants', ['code' => $searchTerm]);
        });
        $products = $query->paginate(30);
        $data = [
            'active_page' => 'products',
            'products' => $products
        ];
        return view('admin.products_list', $data);
    }

    public function products_add()
    {
        $data = [
            'active_page' => 'products'
        ];
        return view('admin.products_add', $data);
    }

    public function products_add_handler(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'description' => 'nullable|string',
            'details' => 'nullable|string',
            'care' => 'nullable|string',
            'materials' => 'nullable|string',
            'measurement' => 'nullable|string',
            'sale_price' => 'required|numeric',
            'regular_price' => 'nullable|numeric',
            'variants' => 'required|string'
        ], [
            'title.required' => 'The product title is required.',
            'title.string' => 'The product title must be a string.',
            'title.max' => 'The product title must not exceed 255 characters.',
            'slug.required' => 'The product slug is required.',
            'description.string' => 'The product description must be a string.',
            'details.string' => 'The product details must be a string.',
            'care.string' => 'The product care instructions must be a string.',
            'materials.string' => 'The product materials must be a string.',
            'measurement.string' => 'The product measurements must be a string.',
            'sale_price.required' => 'The product sale price is required.',
            'sale_price.numeric' => 'The product sale price must be a number.',
            'regular_price.numeric' => 'The product regular price must be a number.',
            'variants.required' => 'The product should have at least 1 variant.'
        ]);

        $product = new Products();
        $product->sub_category_id = $request->sub_category;
        $product->title = $request->title;
        $existingProduct = Products::where('slug', $request->slug)->first();
        if ($existingProduct) {
            $request->slug .= '-' . rand(10000, 99999);
        }
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->care = $request->care;
        $product->materials = $request->materials;
        $product->measurement = $request->measurement;
        $product->sale_price = $request->sale_price;
        $product->regular_price = $request->regular_price;

        $variants = json_decode($request->variants, true);
        $processedVariants = [];
        foreach ($variants as $variantData) {
            $thumbnailPath = null;
            if (isset($variantData['thumbnail'])) {
                $imageData = $variantData['thumbnail'];
                $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
                $imageData = str_replace(' ', '+', $imageData);
                $imageData = base64_decode($imageData);
                
                $thumbnailName = uniqid() . '.jpg';
                $thumbnailPath = 'public/products/' . $thumbnailName;
    
                Storage::put($thumbnailPath, $imageData);
                $thumbnailPath = 'products/' . $thumbnailName;
            }
            
            $processedVariant = [
                'color' => $variantData['color'],
                'size_stock' => $variantData['size_stock'],
                'thumbnail' => $thumbnailPath,
                'code' => $variantData['code']
            ];
            $processedVariants[] = $processedVariant;
        }

        $product->variants = json_encode($processedVariants);
        $product->save();

        return redirect()->route('admin_products_list')->with('success', 'Product has been added successfully');
    }

    public function products_edit()
    {
        try {
            $pid = request()->query('pid');
            $product = Products::findOrFail($pid);
            $data = [
                'active_page' => 'products',
                'product' => $product
            ];
            return view('admin.products_edit', $data);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin_products_list');
        }
    }

    public function products_edit_handler(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'description' => 'nullable|string',
            'details' => 'nullable|string',
            'care' => 'nullable|string',
            'materials' => 'nullable|string',
            'measurement' => 'nullable|string',
            'sale_price' => 'required|numeric',
            'regular_price' => 'nullable|numeric',
            'variants' => 'required|string',
            'pid' => 'required|exists:products,id'
        ], [
            'title.required' => 'The product title is required.',
            'title.string' => 'The product title must be a string.',
            'title.max' => 'The product title must not exceed 255 characters.',
            'slug.required' => 'The product slug is required.',
            'description.string' => 'The product description must be a string.',
            'details.string' => 'The product details must be a string.',
            'care.string' => 'The product care instructions must be a string.',
            'materials.string' => 'The product materials must be a string.',
            'measurement.string' => 'The product measurements must be a string.',
            'sale_price.required' => 'The product sale price is required.',
            'sale_price.numeric' => 'The product sale price must be a number.',
            'regular_price.numeric' => 'The product regular price must be a number.',
            'variants.required' => 'The product should have at least 1 variant.',
            'pid.required' => 'The product id is required.', 
            'pid.exists' => 'The product is not found.'
        ]);

        $product = Products::findOrFail($request->pid);
        $product->sub_category_id = $request->sub_category;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->care = $request->care;
        $product->materials = $request->materials;
        $product->measurement = $request->measurement;
        $product->sale_price = $request->sale_price;
        $product->regular_price = $request->regular_price;

        $variants = json_decode($request->variants, true);
        $processedVariants = [];
        foreach ($variants as $variantData) {
            $thumbnailPath = null;
            if (isset($variantData['thumbnail'])) {
                if (strpos($variantData['thumbnail'], 'data:image/jpeg;base64,') === 0) {
                    $imageData = $variantData['thumbnail'];
                    $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
                    $imageData = str_replace(' ', '+', $imageData);
                    $imageData = base64_decode($imageData);
                    
                    $thumbnailName = uniqid() . '.jpg';
                    $thumbnailPath = 'public/products/' . $thumbnailName;

                    Storage::put($thumbnailPath, $imageData);
                    $thumbnailPath = 'products/' . $thumbnailName;
                } else {
                    $thumbnailPath = $variantData['thumbnail'];
                }
            }
            
            $processedVariant = [
                'color' => $variantData['color'],
                'size_stock' => $variantData['size_stock'],
                'thumbnail' => $thumbnailPath,
                'code' => $variantData['code']
            ];
            $processedVariants[] = $processedVariant;
        }

        $product->variants = json_encode($processedVariants);
        $product->save();

        return redirect()->route('admin_products_edit', ['pid' => $request->pid])->with('success', 'Product has been updated successfully');
    }

    public function products_delete(Request $request)
    {
        $request->validate([
            'pid' => 'required|exists:products,id'
        ], [
            'pid.required' => 'Product ID is required',
            'pid.exists' => 'Invalid product ID'
        ]);
        $product = Products::findOrFail($request->pid);
        $product->delete();
        return redirect()->back()->with('success', 'Product has be removed');
    }
}