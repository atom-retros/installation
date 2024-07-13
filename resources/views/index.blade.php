<x-installation-layout>
    <x-installation::card icon="hotel-icon" title="{{ __('title') }}" subtitle="{{ __('subtitle') }}">
        <div class="space-y-3">
            <p>{{ __('installation_key.message_1') }}</p>
            <p>{{ __('installation_key.message_2') }}</p>
            <p>{{ __('installation_key.message_3') }}</p>
            <p>{{ __('installation_key.message_4') }}</p>
            <p>{!! __('installation_key.message_5', ['documentation_link' => 'https://retros.guide']) !!}</p>
            <p>{!! __('installation_key.message_6', ['discord_link' => 'https://discord.gg/rX3aShUHdg']) !!}</p>
            <p>{{ __('installation_key.message_7') }}</p>
            <p class="italic font-semibold">{{ __('installation_key.message_8') }}</p>
            <p class="py-3 border-t">{{ __('installation_key.message_9') }}</p>

            <form action="{{ route('installation.store') }}" method="POST">
                @csrf

                <x-installation::input id="installation_key" name="installation_key" label="{{ __('installation_key') }}"
                    type="text" placeholder="{{ __('installation_key.placeholder') }}" autofocus required
                    autocomplete="false" />

                <x-installation::secondary-button classes="mt-3">
                    {{ __('installation_key.start_button') }}
                </x-installation::secondary-button>
            </form>
        </div>
    </x-installation::card>
</x-installation-layout>
