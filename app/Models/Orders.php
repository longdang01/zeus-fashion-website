<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function ordersDetails() {
        return $this->hasMany(OrdersDetail::class, 'orders_id', 'id')
        ->where('is_active', 1);
    }

    public function ordersStatus() {
        return $this->hasMany(OrdersStatus::class, 'orders_id', 'id')
        ->where('is_active', 1);
    }

    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id', 'id')
        ->where('is_active', 1);
    } 

    public function transport() {
        return $this->belongsTo(Transport::class, 'transport_id', 'id')
        ->where('is_active', 1);
    } 

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id')
        ->where('is_active', 1);
    } 

    public function deliveryAddress() {
        return $this->belongsTo(DeliveryAddress::class, 'delivery_address_id', 'id')
        ->where('is_active', 1);
    } 
}
