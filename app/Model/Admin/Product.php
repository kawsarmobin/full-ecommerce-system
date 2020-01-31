<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const ATTACH_UPLOAD_PATH = 'public/media/products';

    protected $fillable = [
        'category_id', 'subcategory_id', 'brand_id', 'product_name', 'product_code', 'product_quantity', 'product_details', 'product_color', 'product_size', 'selling_price', 'discount_price', 'video_link', 'main_slider', 'hot_deal', 'best_rated', 'mid_slider', 'hot_new', 'buyone_getone', 'trend', 'image_one', 'image_two', 'image_three', 'status',
    ];

    private $status;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getImageOneAttribute($value)
    {
        return asset(Product::ATTACH_UPLOAD_PATH . '/' . $value);
    }

    public function getImageTwoAttribute($value)
    {
        return asset(Product::ATTACH_UPLOAD_PATH . '/' . $value);
    }

    public function getImageThreeAttribute($value)
    {
        return asset(Product::ATTACH_UPLOAD_PATH . '/' . $value);
    }
}
