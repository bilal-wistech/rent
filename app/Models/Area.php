<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $fillable = [
        'name',
        'image',
        'show_on_front',
        'city_id',
        'country_id',
    ];
    public function getImageUrlAttribute()
    {
        $image = $this->attributes['image'] ?? null;

        if (empty($image)) {
            return asset('images/default-image.png');
        }

        return asset('front/images/front-areas/' . $image);
    }
}
