<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'delivery_address', 'customer_id', 'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
