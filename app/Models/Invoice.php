<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'property_id',
        'customer_id',
        'currency_code',
        'created_by',
        'reference_no',
        'invoice_no',
        'invoice_date',
        'due_date',
        'description',
        'admin_notes',
        'sub_total',
        'grand_total',
        'payment_status'
    ];
    protected static function booted()
    {
        static::creating(function ($model) {
            $invoiceNo = $model->generateInvoiceNumber();
            $invReferenceNumber = 'INV-' . sprintf('%06d', $invoiceNo);
            $model->invoice_no = $invoiceNo;
            $model->reference_no = $invReferenceNumber;
        });
    }
    public function generateInvoiceNumber()
    {
        $id = 1;
        $result = self::orderBy('invoice_no', 'desc')->first();
        if ($result != null) {
            $id = $result->invoice_no + 1;
        }
        return $id;
    }
}
