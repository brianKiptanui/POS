<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
            'delivery_date' => $this->delivery_date,
            'user_id' => $this->user_id,
            'delivered' => $this->delivered,
        ];
    }
}
