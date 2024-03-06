<?php

namespace App\Http\Requests\admin\airport;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAirportRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'new_items' => json_decode($this->new_items, true),
            'update_items' => json_decode($this->update_items, true),
        ]);
    }

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
            'airport_name' => 'required|max:255',
            'cc_email' => 'required|email',
            'description' => 'nullable|string',
            'airport_status' => 'required|in:0,1',
            'new_items' => 'nullable|array',
            'new_items.*.name' => 'required|string|max:255',
            'new_items.*.shortname' => 'required|string|max:255',
            'new_items.*.status' => 'required|in:0,1',
            'update_items' => 'nullable|array',
            'update_items.*.id' => 'required|numeric|max:255',
            'update_items.*.name' => 'required|string|max:255',
            'update_items.*.shortname' => 'required|string|max:255',
            'update_items.*.status' => 'required|in:0,1',
        ];
    }
}
