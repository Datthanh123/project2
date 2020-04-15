<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if(!empty($keyword)){
           $news = News::where('id', 'LIKE', "%$keyword%")
           ->orWhere('news_title', 'LIKE', "%$keyword")
           ->orWhere('news_image', 'LIKE', "%$keyword")
           ->orWhere('news_views', 'LIKE', "%$keyword")
           ->orWhere('news_author', 'LIKE', "%$keyword")
           ->latest()->paginate(10);
        }
        else{
            $news = News::latest()->paginate(10);
        }
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = NewsCategory::pluck('cate_name', 'id');
        return view('admin.news.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'news_title'=>'required',
            'news_tease'=>'required',
            'news_content'=>'required',
            'news_author'=>'required',
            'news_views'=>'required',
            'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $requestData = $request->except('news_image');
        if($request->hasFile('news_image'))
        {
            $image = $request->file('image');

            $filename = 'news' . '-' . time() . '.'. $image->getClientOriginalExtension();

            $location = public_path('Upload/News');
            $request->file('image')->move($location, $filename);
            $requestData['product_image'] = $filename;
        }
        News::create($requestData);
        return redirect('admin/news')->with('flash_message','News added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = NewsCategory::pluck('cate_name','id');
        $news = News::find($id);
        return view('admin.news.edit', compact('cates', 'news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'news_title'=>'required',
            'news_tease'=>'required',
            'news_content'=>'required',
            'news_author'=>'required',
            'news_views'=>'required',
            'news_image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $requestData = $request->except('news_image');
        if($request->hasFile('news_image'))
        {
            $image = $request->file('news_image');

            $filename = 'news' . '-' . time() . '.'. $image->getClientOriginalExtension();

            $location = public_path('Upload/News');
            $request->file('news_image')->move($location, $filename);
            $requestData['news_image'] = $filename;
        }
        $news = News::findOrFail($id);
        News::create($requestData);
        return redirect('admin/news')->with('flash_message','News added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('/admin/news')->with('success','Product deleted!');
    }
}
