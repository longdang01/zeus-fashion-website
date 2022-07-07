<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $table = 'delivery_address';

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id')
        ->where('is_active', 1);
    } 
}
