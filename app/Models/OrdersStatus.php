<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersStatus extends Model
{
    use HasFactory;

    protected $table = 'orders_status';
    
    public function orders() {
        return $this->belongsTo(Orders::class, 'orders_id', 'id')
        ->where('is_active', 1);
    } 
    
}
