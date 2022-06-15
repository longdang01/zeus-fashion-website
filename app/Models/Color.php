<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color';

    public function sizes() {
        return $this->hasMany(Size::class, 'color_id', 'id')
        ->where('is_active', 1);
    }

    public function images() {
        return $this->hasMany(Image::class, 'color_id', 'id')
        ->where('is_active', 1);
    }

    public function discounts() {
        return $this->hasMany(Discount::class, 'color_id', 'id')
        ->where('is_active', 1);
    }

    public function price() {
        return $this->hasOne(Price::class, 'color_id', 'id')
        ->where('is_active', 1);
    }

}
