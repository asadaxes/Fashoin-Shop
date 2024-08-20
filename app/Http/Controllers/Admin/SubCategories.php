<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;


class SubCategories extends Controller
{
    public function list()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $data = [
            'active_page' => 'sub_category',
            'categories' => $categories,
            'sub_categories' => $sub_categories
        ];
        return view('admin.sub_category', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:100'
        ], [
            'category_id.required' => 'Please select a category',
            'category_id.exists' => 'The selected category does not exist',
            'title.required' => 'Sub-category name is required',
            'title.max' => 'You have reached the maximum length for the sub-category name'
        ]);

        $category = Category::findOrFail($request->category_id);
        $subCategory = new SubCategory();
        $subCategory->category_id = $category->id;
        $subCategory->title = $request->title;
        $subCategory->save();
        return redirect()->back()->with('success', 'Sub-Category created successfully');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:100',
            'id' => 'required'
        ], [
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Invalid category selected',
            'title.required' => 'sub-category name is required',
            'title.max' => 'you have reached the maximum length',
            'id.required' => 'Sub-Category ID is required'
        ]);

        $subCategory = SubCategory::findOrFail($request->id);

        $subCategory->title = $request->title;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();
        return redirect()->back()->with('success', 'Sub-Category update successfully');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ], [
            'id.required' => 'Sub-Category ID is required'
        ]);
        $sub_category = SubCategory::findOrFail($request->id);
        $sub_category->delete();
        return redirect()->back()->with('success', 'Sub-Category deleted successfully');
    }
}