<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['vat', 'shipping_charge', 'shop_name', 'email', 'phone', 'address', 'logo'];
}
