<?php

namespace App\Http\Requests\admin\promotions;

use Illuminate\Foundation\Http\FormRequest;

class CreatePromotionsRequest extends FormRequest
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
            'code' => 'required|string',
            'description' => 'nullable|string', // 'nullable' allows it to be empty or null along with being a string
            'amount' => 'required|integer|min:1', // 'nullable' allows it to be
            'expire' => 'nullable|date|after:today', // Ensures the date is in the future or today
            'minimum_spend' => 'nullable|numeric|lt:maximum_spend|min:1', // Ensures minimum_spend is less than maximum_spend
            'maximum_spend' => 'nullable|numeric|min:1', // Validation rule for maximum_spend
            'use_limit' => 'required|integer|min:1',
            'user_limit' => 'required|integer|lt:use_limit|min:1',
        ];
    }
}
