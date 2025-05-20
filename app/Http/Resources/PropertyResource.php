<?php

namespace App\Http\Resources;

use App\Models\Amenities;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'accommodates' => $this->accommodates,
            'bedrooms' => $this->bedrooms,
            'beds' => $this->beds,
            'bathrooms' => $this->bathrooms,
            'space_type_name' => $this->space_type_name,
            'property_type_name' => $this->property_type_name,
            'overall_rating'=> $this->overall_rating,
            'cover_photo'=> $this->cover_photo,
            'bedType' => $this->whenLoaded('bed_types', fn() => $this->bed_types ? $this->bed_types : null),
            'price' => $this->whenLoaded('property_price', fn() => $this->property_price ? $this->property_price->price : null),
            'priceType' => $this->whenLoaded('property_price', fn() => $this->property_price && $this->property_price->pricingType ? [
                'id' => $this->property_price->pricingType->id,
                'name' => $this->property_price->pricingType->name
            ] : null),
            'currency' => $this->whenLoaded('property_price', fn() => $this->property_price->currency),
            'address' => $this->whenLoaded('property_address', fn() => [
                'city' => $this->property_address->city,
                'state' => $this->property_address->state,
                'country' => $this->property_address->country,
                'area' => $this->property_address->area,
                'building' => $this->property_address->building,
                'flat_no' => $this->property_address->flat_no,
            ]),
            'host' => $this->whenLoaded('users', fn() => [
                'id' => $this->users->id,
                'name' => $this->users->name,
                'email' => $this->users->email
            ]),
            'amenities' => Amenities::select('id', 'title', 'type_id')->with(['amenityType' => function ($query) {
                $query->select('id', 'name');
            }])
                ->whereIn('id', explode(',', $this->amenities))
                ->get(),
            'created_at' => $this->when($this->created_at, fn() => $this->created_at->toIso8601String(), null),
            'updated_at' => $this->when($this->updated_at, fn() => $this->updated_at->toIso8601String(), null),
        ];
    }
}
