<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'price';

    public function getPrice($color) {
        if(!$color['sale']) {
            return $color['price']['price'];
        } else {
            if ($color['sale']['symbol'] == 'K') return $color['price']['price'] - $color['sale']['value'];
            else return $color['price']['price'] * ((100 - $color['sale']['value']) / 100);
        }
    }
}
