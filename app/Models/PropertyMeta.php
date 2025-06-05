<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyMeta extends Model
{
    protected $table = 'property_metas';

    public $timestamps = true;

    protected $fillable = [
        'property_id',
        'title',
        'description',
        'image',
    ];

    public function properties()
    {
        return $this->belongsTo(Properties::class);
    }
}
