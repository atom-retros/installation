@props(['name' => ''])

<label class="block font-semibold text-gray-700" for="{{ $name }}">
    {{ $slot }}
</label>
