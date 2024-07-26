<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function designer()
    {
        return $this->belongsTo(Designer::class, 'designer_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'product_id');
    }
}
