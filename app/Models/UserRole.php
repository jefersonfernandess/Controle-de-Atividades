<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'users_roles';

    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
