@props(['value', 'name', 'label', 'type', 'placeholder', 'autofocus', 'required', 'autocomplete'])

<fieldset class="space-y-1">
    @isset($label)
        <x-installation::label for="{{ $name }}">
            {{ $label }}
        </x-installation::label>
    @endisset

    <input
        class="focus:ring-0 border-4 border-gray-200 rounded focus:border-[#eeb425] w-full {{ isset($errors) && $errors->has($name) ? 'border-red-600 ring-red-500' : '' }}"
        id="{{ $name }}" type="{{ $type ?? 'text' }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        autofocus="{{ $autofocus ?? false }}" required="{{ $required ?? false }}" value="{{ $value ?? null }}"
        autocomplete="{{ $autocomplete ?? 'off' }}" />

    @isset($errors)
        @error($name)
            <p class="mt-1 text-xs italic text-red-500">
                {{ $message }}
            </p>
        @enderror
    @endisset
</fieldset>
