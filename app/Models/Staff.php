<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    public function users() {
        return $this->belongsTo(Users::class, 'users_id', 'id')
        ->where('is_active', 1);
    } 
    
    public function position() {
        return $this->belongsTo(Position::class, 'position_id', 'id')
        ->where('is_active', 1);
    } 

}
