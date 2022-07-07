<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';

    public function positions() {
        return $this->hasMany(Position::class, 'role_id', 'id')->where('is_active', 1);
    }
}
