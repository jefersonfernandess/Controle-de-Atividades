<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicipline extends Model
{
    use HasFactory;

    protected $table = 'diciplines';

    protected $fillable = 'name';
}
