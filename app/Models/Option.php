<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'options';

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
