<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'destination', 'tour_id', 'date', 'special_requests'
    ];

    // Define relationships if needed
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
