<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BloodPressure extends Model
{
    protected $fillable = [
        'user_id',
        'systolic',
        'diastolic',
        'pulse',
        'notes',
        'measured_at',
    ];

    protected $casts = [
        'measured_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
