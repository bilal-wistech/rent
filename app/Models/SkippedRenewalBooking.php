<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkippedRenewalBooking extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'property_id', 'start_date', 'end_date', 'reason'];
}
