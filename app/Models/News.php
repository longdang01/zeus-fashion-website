<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function staff() {
        return $this->belongsTo(Staff::class, 'staff_id', 'id')
        ->where('is_active', 1);
    }
}
