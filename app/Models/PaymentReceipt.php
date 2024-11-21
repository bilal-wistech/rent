<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'paid_through', 'payment_date', 'amount'];
}
