<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'price_per_hour',
        'image',
        'status',
    ];

    /**
     * Relasi ke Jadwal
     * Satu lapangan memiliki banyak jadwal.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Relasi ke Booking
     * Satu lapangan memiliki banyak booking.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}