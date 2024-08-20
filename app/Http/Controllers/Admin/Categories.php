<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class Categories extends Controller
{
    public function list()
    {
        $categories = Category::all();
        $data = [
            'active_page' => 'category',
            'categories' => $categories
        ];
        return view('admin.category', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
        ], [
            'title.required' => 'category name is required',
            'title.max' => 'you have reached the maximum length',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'id' => 'required'
        ], [
            'title.required' => 'category name is required',
            'title.max' => 'you have reached the maximum length',
            'id.required' => 'Category ID is required'
        ]);

        $category = Category::findOrFail($request->id);
        $category->title = $request->title;
        $category->save();
        return redirect()->back()->with('success', 'Category update successfully');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ], [
            'id.required' => 'Category ID is required'
        ]);
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}