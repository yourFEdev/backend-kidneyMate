<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FluidIntake extends Model
{
    protected $fillable = [
        'user_id',
        'drink_name',
        'amount',
        'notes',
        'drank_at'
    ];

    protected $casts = [
        'drank_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
