<?php

// @Author Achyut Neupane

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->get();
        return view('admin.listSubCategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Category::all()->count() == 0) {
            return redirect()->route('addCategory');
        }
        $categories = Category::all();
        return view('admin.addSubCategory', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        SubCategory::create($sub);
        return redirect()->route('listCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = SubCategory::find($id);
        $category = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $new->name = $request->name;
        $new->description = $request->description;
        $new->save();
        return redirect()->route('listCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return redirect()->route('listCategory');
    }
    public function list($id)
    {
        $cats = Category::with(['sub_categories'])->find($id);
        return $cats->sub_categories;
    }
}