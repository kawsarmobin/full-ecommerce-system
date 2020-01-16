<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    const ATTACH_UPLOAD_PATH = 'public/media/blog';

    protected $fillable = ['blog_category_id', 'title_en', 'title_bn', 'image', 'description_en', 'description_bn'];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function getImageAttribute($value)
    {
        return asset(BlogPost::ATTACH_UPLOAD_PATH. '/' .$value);
    }
}
