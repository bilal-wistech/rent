<?php

/**
 * PropertyDates Model
 *
 * PropertyDates Model manages PropertyDates operation.
 *
 * @category   PropertyDates
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2020 Techvillage
 * @license
 * @version    2.7
 * @link       http://techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
class PropertyDates extends Model
{
    use SoftDeletes;
    protected $table = 'property_dates';
    protected $fillable = ['property_id', 'booking_id', 'status', 'date', 'min_day', 'min_stay', 'price', 'color', 'type'];

    public function properties()
    {
        return $this->belongsTo('App\Models\Properties', 'property_id', 'id');
    }
    public function bookings()
    {
        return $this->belongsTo(Bookings::class, 'booking_id');
    }

    public static function getTempDates()
    {
        $data = Cache::get(config('cache.prefix') . '.calc.property_price');
        if (empty($data)) {
            $data = PropertyDates::all();
            Cache::put(config('cache.prefix') . '.calc.property_price', $data, 30 * 86400);
        }
        return $data;
    }
}
