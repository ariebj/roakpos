<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMethod extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'order_method';

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
