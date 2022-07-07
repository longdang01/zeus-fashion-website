<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    public function users() {
        return $this->belongsTo(Users::class, 'users_id', 'id')
        ->where('is_active', 1);
    } 

    public function deliveryAddress() {
        return $this->hasMany(DeliveryAddress::class, 'customer_id', 'id');
    }

}
