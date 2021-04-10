<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InvoiceCollection extends ResourceCollection
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
            'sale_id'=> $this->sale_id,
            'invoice_number'=> $this->invoice_number,
            'user_id'=> $this->user_id
        ];
    }
}
