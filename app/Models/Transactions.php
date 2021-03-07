<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $primaryKey = 'invoice_number';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    protected $table = 'transactions';

    public function product()
    {
        return $this->hasMany(ProductTransactions::class, 'invoice_number', 'invoice_number');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
