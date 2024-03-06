<?php

namespace App\Http\Requests\admin\prices;

use Illuminate\Foundation\Http\FormRequest;

class GetProductCategory extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => 'required|integer',
            'airport_id' => 'required|integer', // 'nullable' allows it to be empty or null along with being a string
        ];
    }
}
