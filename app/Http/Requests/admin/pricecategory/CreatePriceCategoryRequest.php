<?php

namespace App\Http\Requests\admin\pricecategory;

use Illuminate\Foundation\Http\FormRequest;

class CreatePriceCategoryRequest extends FormRequest
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
            'newcategory' => 'required|string',
            'prices' => 'required|array', // Ensuring it's an array
            'prices.*' => 'nullable|numeric|gte:0', // Rule for each element in the array (nullable and numeric)
        ];
    }   
}
