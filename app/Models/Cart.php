<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    public function cartDetails() {
        return $this->hasMany(CartDetail::class, 'cart_id', 'id')
        ->where('is_active', '!=', -1);
    }
}
