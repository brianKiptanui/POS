<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'invoice_id'=> $this->invoice_id,
            'payment_method'=> $this->payment_method,
            'transaction_id'=> $this->transaction_id,
            'amount'=> $this->amount,
        ];
    }
}
