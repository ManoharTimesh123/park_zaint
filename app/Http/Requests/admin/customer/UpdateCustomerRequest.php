<?php

namespace App\Http\Requests\admin\customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . request()->id,
            'phone' => 'required|integer|unique:users,phone,' . request()->id,
            'account_type' => 'required|in:Individual,Corporate',
            'status' => 'required|boolean',
        ];
    }
}
