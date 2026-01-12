<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'mass',
        'frequency',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
