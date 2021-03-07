<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    public function order_method()
    {
        return $this->belongsTo(OrderMethod::class);
    }
}
