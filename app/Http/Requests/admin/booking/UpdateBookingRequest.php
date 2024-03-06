<?php

namespace App\Http\Requests\admin\booking;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'company_name' => 'required|string|max:100',
            'outbound_flight' => 'required|string|max:100',
            'outbound_terminal' => 'required|integer',
            'inbound_flight' => 'required|string|max:100',
            'inbound_terminal' => 'required|integer',
            'no_of_passengers' => 'required|integer|gt:0',
            'new_items' => ['nullable', 'json'],
            'new_items.*.reg_no' => 'required|string',
            'new_items.*.maker' => 'required|string',
            'new_items.*.model' => 'required|string',
            'new_items.*.color' => 'required|string',
        ];
    }
}
