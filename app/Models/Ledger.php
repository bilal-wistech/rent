<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function currency()
    {
        return $this->belongsTo('App\Models\currency', 'currency_id', 'id');
    }

    public function payment_methods()
    {
        return $this->belongsTo('App\Models\PaymentMethods', '', 'id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\admin','', 'id');
    }
}
