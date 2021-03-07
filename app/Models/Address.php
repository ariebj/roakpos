<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'billing_address';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
