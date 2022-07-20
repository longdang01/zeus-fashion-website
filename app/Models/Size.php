<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'size';

    public function updateSize($item, $action) {
        
        $size = Size::findOrFail($item['size_id']);

        $size->quantity = ($action === 1)
        ? $size->quantity - $item['quantity'] : $size->quantity + $item['quantity'];
        $size->save();  
    }

}
