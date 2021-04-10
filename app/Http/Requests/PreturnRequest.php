<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreturnRequest extends FormRequest
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
            'product_id' => 'required',
            'return_date' => 'required',
            'user_id' => 'required',
        ];
    }
}
