<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityResponse extends Model
{
    use HasFactory;

    protected $table = 'activities_responses';

    protected $fillable = [
        'activity_id',
        'user_id',
        'check',
        'note',
        'filepath',
        'description'
    ];

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Activity() {
        return $this->belongsTo(Activity::class, 'activiy_id', 'id');
    }
}
