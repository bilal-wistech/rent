<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'security_refund_date', 'security_refund_amount','description','security_refund_paid_through','recieved_by','created_by'];
}
