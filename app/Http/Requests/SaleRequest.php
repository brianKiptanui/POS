<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id'=> 'required',
            'user_id'=> 'required',
            'delivery_date'=> 'required',
            'unit_price'=> 'required',
            'quantity'=> 'required|max:2',
            'total_discount'=> 'required|max:2',
            'total_tax'=> 'required|max:2',
            'total_amount'=> 'required',
        ];
    }
}
