<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id')
        ->where('is_active', 1);
    } 

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id')
        ->where('is_active', 1);
    } 

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id')
        ->where('is_active', 1);
    } 

    public function colors() {
        return $this->hasMany(Color::class, 'product_id', 'id')->where('is_active', 1);
    }
}
