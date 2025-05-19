<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;


class Testimonials extends Model
{

	public static function getAll()
    {
        $data = Cache::get('vr-testimonials');
        if (empty($data)) {
            $data = parent::where('status', 'Active')
                    ->inRandomOrder()
                    ->take(3)
                    ->get()
                    ->map(function ($testimonial) {
                        return [
                            'id' => $testimonial->id,
                            'name' => $testimonial->name,
                            'description' => $testimonial->description,
                            'status' => $testimonial->status,
                            'created_at' => $testimonial->created_at,
                            'updated_at' => $testimonial->updated_at,
                            'image' => $testimonial->image_url, // Use the accessor
                            'review' => $testimonial->review ?? 5, // Default to 5 if null
                        ];
                    });
            Cache::put('vr-testimonials', $data, 86400);
        }
        return $data;
    }

    public function getImageUrlAttribute()
    {
        return url('/public/front/images/testimonial/' . $this->attributes['image']);
    }
}

