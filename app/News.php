<?php

namespace App;
use App\NewsCategory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];
    public function newscategories() {
        return $this->belongsTo(NewsCategory::class, 'news_cate', 'id');
    }
}
