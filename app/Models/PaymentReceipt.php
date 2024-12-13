<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'invoice_id', 'paid_through', 'payment_date', 'amount'];

    public function booking()
    {
        return $this->belongsTo(Bookings::class, 'booking_id', 'id');
    }
}
