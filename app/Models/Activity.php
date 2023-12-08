<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'user_id',
        'dicipline_id',
        'name',
        'filepath',
        'description'
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Dicipline() {
        return $this->belongsTo(Dicipline::class, 'dicipline_id', 'id');
    }
}
