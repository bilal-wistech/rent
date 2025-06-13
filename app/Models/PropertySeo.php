<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertySeo extends Model
{
    protected $fillable = ['property_id', 'title', 'description', 'image'];
}

