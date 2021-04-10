<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'product_id'=> $this->product_id,
            'delivery_date' => $this->delivery_date,
            'user_id' => $this->user_id,
            'unit_price' => $this->unit_price,
            'quantity' => $this->quantity,
            'total_discount' => $this->total_discount,
            'total_tax' => $this->total_tax,
            'total_amount' => $this->total_amount
        ];
    }
}
