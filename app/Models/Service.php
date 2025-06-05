<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_content_id',
        'full_name',
        'phone',
        'no_of_guests',
        'preferred_date',
        'preferred_time',
        'notes'
    ];
}
