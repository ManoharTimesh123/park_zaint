<?php

namespace App\Http\Requests\admin\booking;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'company_name' => 'required|string|max:100',
            'outbound_flight' => 'required|string|max:100',
            'airport' => 'required|integer',
            'outbound_terminal' => 'required|integer',
            'inbound_flight' => 'required|string|max:100',
            'inbound_terminal' => 'required|integer',
            'addons_id' => ['nullable', 'array'],
            'addons_id.*' => ['integer'],
            'travel_start_date' => 'required|date',
            'travel_end_date' => 'required|date|after_or_equal:travel_start_date',
            'no_of_passengers' => 'required|integer|gt:0',
            'new_items' => ['nullable', 'json'],
            'new_items.*.reg_no' => 'required|string',
            'new_items.*.maker' => 'required|string',
            'new_items.*.model' => 'required|string',
            'new_items.*.color' => 'required|string',
        ];
    }
}
