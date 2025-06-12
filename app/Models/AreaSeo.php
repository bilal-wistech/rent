<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaSeo extends Model
{
    protected $fillable = ['area_id', 'city_id', 'country_id', 'title', 'description', 'image'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

