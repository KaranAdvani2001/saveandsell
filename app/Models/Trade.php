<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function sellerProduct()
    {
        return $this->belongsTo(Product::class, 'seller_product');
    }

    public function buyerProduct()
    {
        return $this->belongsTo(Product::class, 'buyer_product');
    }
}
