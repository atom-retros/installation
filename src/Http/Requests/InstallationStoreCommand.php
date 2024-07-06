<?php

namespace Atom\Installation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallationStoreCommand extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'installation_key' => ['required', 'string', 'exists:website_installation,installation_key'],
        ];
    }
}
