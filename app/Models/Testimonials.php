<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;


class Testimonials extends Model
{
	protected $appends = ['image_url'];
	public static function getAll()
	{
		$data = Cache::get('vr-testimonials');
		if (empty($data)) {
			$data = parent::where('status', 'Active')
					->inRandomOrder()->take(3)->get();
			Cache::put('vr-testimonials', $data, 86400);
		}
		return $data;
	}

    public function getImageUrlAttribute()
    {
        return asset('front/images/testimonial/' . $this->attributes['image']);
    }
}

