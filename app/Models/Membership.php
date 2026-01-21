<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Membership extends Model
{
    protected $fillable = [
        'user_id',
        'discount_percentage',
        'start_date',
        'end_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'discount_percentage' => 'decimal:2',
    ];

    // Relación con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Verificar si la membresía está activa
    public function isActive(): bool
    {
        return $this->status === 'active'
            && Carbon::now()->between($this->start_date, $this->end_date);
    }

    // Obtener días restantes
    public function daysRemaining(): int
    {
        if (!$this->isActive()) {
            return 0;
        }

        return Carbon::now()->diffInDays($this->end_date, false);
    }

    // Actualizar estado automáticamente
    public function updateStatus(): void
    {
        if (Carbon::now()->isAfter($this->end_date)) {
            $this->update(['status' => 'expired']);
        }
    }

    // Scope para membresías activas
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now());
    }

    // Scope para membresías próximas a expirar
    public function scopeExpiringSoon($query, $days = 30)
    {
        return $query->where('status', 'active')
            ->whereBetween('end_date', [
                Carbon::now(),
                Carbon::now()->addDays($days)
            ]);
    }
}