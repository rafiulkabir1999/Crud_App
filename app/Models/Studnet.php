<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studnet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        's_id',
        'address',
        'phone',
    ];
}
