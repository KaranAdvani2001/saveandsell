<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name','description','size','price', 'product_image'];
    public function category()
    {
        return $this->belongsTo(Category::class);
}
    public function variations()
    {
        return $this->hasMany(Variation::class);


}
        
}

