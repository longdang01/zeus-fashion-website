<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function staff() {
        return $this->hasOne(Staff::class, 'users_id', 'id')
        ->where('is_active', 1);
    }

    public function customer() {
        return $this->hasOne(Customer::class, 'users_id', 'id')
        ->where('is_active', 1);
    }
}
