<?php

namespace App\Http\Controllers;


use App\NewsCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = NewsCategory::with('childs')->where('cate_parent', 0)->paginate(10);
        return view('admin.newscategories.index', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = NewsCategory::with('childs')->where('cate_parent', 0)->select('cate_name', 'id')->get();
        $category = new NewsCategory();
        return view('admin.newscategories.create',compact('cates','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cate_name'=>'required',
            'cate_parent'=>'required'
        ]);
        $cates = new NewsCategory();
        $cates->cate_name = $request->cate_name;
        $slug = Str::slug($request->cate_name,'-');
        $cates->cate_slug = $slug;
        $cates->cate_parent = $request->cate_parent;
        $cates->save();
        return redirect('/admin/newscategories')->with('success','Category saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = NewsCategory::with('childs')->where('cate_parent',0)->select('cate_name','id')->get();
        $category = NewsCategory::findOrFail($id);
        return view('admin.newscategories.edit', compact('cates','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cate_name'=>'required',
            'cate_parent'=>'required'
        ]);
        $cate = NewsCategory::findOrFail($id);
        $cate->cate_name = $request->cate_name;
        $slug = Str::slug($request->cate_name,'-');
        $cate->cate_slug = $slug;
        $cate->cate_parent = $request->cate_parent;
        $cate->save();
        return redirect('/admin/newscategories')->with('success','Category update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cate = NewsCategory::findOrFail($id);
        $cate->delete();
        return redirect('/admin/newscategories')->with('success','Category deleted');
    }
}
