<?php

namespace Atom\Installation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class InstallationUpdateRequest extends FormRequest
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
        $columns = array_keys(Arr::get(config('installation.settings', []), $this->route('installation'), []));

        return collect($columns)
            ->mapWithKeys(fn ($column) => [$column => ['required', 'string']])
            ->toArray();
    }
}
