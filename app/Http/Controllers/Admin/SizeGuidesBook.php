<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SizeGuides;
use App\Models\SubCategory;

class SizeGuidesBook extends Controller
{
    public function list()
    {
        $guides = SizeGuides::all();
        $data = [
            'active_page' => 'size_guides',
            'guides' => $guides
        ];
        return view('admin.size_guides', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'guide_content' => 'required|string'
        ], [
            'sub_category_id.required' => 'Please select a sub-category',
            'sub_category_id.exists' => 'The selected sub-category does not exist',
            'guide_content.required' => 'Size guide content is required'
        ]);

        $sub_category = SubCategory::findOrFail($request->sub_category_id);
        $size_guide = new SizeGuides();
        $size_guide->sub_category_id = $sub_category->id;
        $size_guide->guide_content = $request->guide_content;
        $size_guide->save();
        return redirect()->back()->with('success', 'New size guides added successfully');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'guide_content' => 'required|string',
            'id' => 'required'
        ], [
            'sub_category_id.required' => 'Please select a sub-category',
            'sub_category_id.exists' => 'The selected sub-category does not exist',
            'guide_content.required' => 'Guide content name is required',
            'id.required' => 'Size guide ID is required'
        ]);

        $size_guide = SizeGuides::findOrFail($request->id);

        $size_guide->guide_content = $request->guide_content;
        $size_guide->sub_category_id = $request->sub_category_id;
        $size_guide->save();
        return redirect()->back()->with('success', 'Size guide update successfully');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ], [
            'id.required' => 'Size guides ID is required'
        ]);
        $size_guide = SizeGuides::findOrFail($request->id);
        $size_guide->delete();
        return redirect()->back()->with('success', 'Size guide deleted successfully');
    }
}