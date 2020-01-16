<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    const ATTACH_UPLOAD_PATH = 'public/media/brand/';

    protected $fillable = ['name', 'logo'];

    public function getLogoAttribute($value)
    {
        return asset(Brand::ATTACH_UPLOAD_PATH . $value);
    }
}
