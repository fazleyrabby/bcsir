<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorCount extends Model
{
    protected $fillable = ['ip', 'page', 'user_agent', 'visited_at'];

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
