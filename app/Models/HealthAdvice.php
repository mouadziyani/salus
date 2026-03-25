<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthAdvice extends Model
{
    use HasFactory;

    protected $table = 'health_advices';

    protected $fillable = [
        'user_id',
        'advice',
        'generated_at',
        'symptoms_used',
    ];

    protected $casts = [
        'generated_at' => 'datetime',
        'symptoms_used' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
