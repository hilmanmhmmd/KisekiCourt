<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'court_id',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    /**
     * Relasi ke Lapangan
     */
    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    /**
     * Relasi ke Booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}