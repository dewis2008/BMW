<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequestRequest extends FormRequest
{
    protected $errorBag = 'quote';

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:50'],
            'vehicle_model' => ['nullable', 'string', 'max:150'],
            'service_required' => [
                'required',
                'string',
                Rule::in([
                    'Diagnostics',
                    'Repair',
                    'Coding',
                    'Engine rebuild',
                    '8HP swap',
                    'Drift build',
                    'Turbo build',
                    'Performance build',
                    'Custom project',
                    'Other',
                ]),
            ],
            'preferred_contact_method' => [
                'required',
                'string',
                Rule::in(['Email', 'Phone', 'WhatsApp']),
            ],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'website' => ['nullable', 'prohibited'],
        ];
    }

    public function messages(): array
    {
        return [
            'website.prohibited' => 'We could not process this request. Please try again.',
        ];
    }
}
