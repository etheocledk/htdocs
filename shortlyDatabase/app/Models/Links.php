<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    use HasFactory;

    protected $fillable = [
        'oldLinks',
        'shortLinks',
        'user_id',
    ];

    protected $table="links";
}
