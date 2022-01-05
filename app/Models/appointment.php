<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    protected $casts = [
        'active' => 'boolean',
    ];

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }
    use HasFactory;
}
