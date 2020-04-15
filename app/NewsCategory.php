<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\NewsCategory;
use App\News;

class NewsCategory extends Model
{
    protected $guarded = [];
    public function childs(){
        return $this->hasMany(NewsCategory::class, 'cate_parent', 'id');
    }
    public function news(){
        return $this->hasMany(News::class, 'news_cate', 'id');
    }
}
