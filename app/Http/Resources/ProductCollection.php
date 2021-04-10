<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
            'totalPrice'=> round((1-($this->discount/100))*$this->price,2),
            'description' => $this->description
        ];
    }
}
