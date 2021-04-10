<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=> $this->name,
            'price' => $this->price,
            'units' => $this->units,
            'barcode' => $this->barcode,
            'tax' => $this->tax,
            'discount' => $this->discount,
            'description' => $this->description
        ];
    }
}
