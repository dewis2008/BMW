<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    protected $errorBag = 'contact';

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
            'email_or_phone' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:1200'],
            'website' => ['nullable', 'prohibited'],
        ];
    }

    public function messages(): array
    {
        return [
            'website.prohibited' => 'We could not process this request. Please try again.',
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('home').'#quote-form';
    }
}
