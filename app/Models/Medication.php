<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medication extends Model
{
    protected $fillable = [
        'user_id',
        'medicine_name',
        'dosage',
        'instruction',
        'schedule_time',
        'frequency',
        'start_date',
        'end_date',
        'notes',
    ];

    protected $casts = [
        'schedule_time' => 'datetime:H:i',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
