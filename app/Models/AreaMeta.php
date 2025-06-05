<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaMeta extends Model
{
    use HasFactory;

    protected $table = 'area_metas';

    protected $fillable = [
        'area_id',
        'title',
        'description',
        'image',
    ];

    // Relationship: AreaMeta belongs to an Area
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

}
