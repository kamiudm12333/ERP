<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $clientId = $this->route('client') ? $this->route('client')->id : null;
        
        return [
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $clientId,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10',
            'country' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'status' => 'required|in:active,inactive,pending',
            'total_business' => 'nullable|numeric|min:0|max:999999999.99',
            'last_contact_date' => 'nullable|date|before_or_equal:today'
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Client name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'status.required' => 'Please select a client status.',
            'status.in' => 'Please select a valid status.',
            'total_business.numeric' => 'Total business value must be a number.',
            'total_business.min' => 'Total business value cannot be negative.',
            'last_contact_date.date' => 'Please enter a valid date.',
            'last_contact_date.before_or_equal' => 'Last contact date cannot be in the future.'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'client name',
            'company_name' => 'company name',
            'email' => 'email address',
            'phone' => 'phone number',
            'zip_code' => 'zip code',
            'total_business' => 'total business value',
            'last_contact_date' => 'last contact date'
        ];
    }
}
