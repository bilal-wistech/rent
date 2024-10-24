<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable = [
        'alert_type_id',
        'subject',
        'content'
    ];
    public function alertType()
    {
        return $this->hasOne(AlertType::class);
    }
}
