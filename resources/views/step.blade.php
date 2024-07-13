<x-installation-layout>
    <x-installation::card icon="hotel-icon" title="{{ __('title') }}" subtitle="{{ __('subtitle') }}">

        <form action="{{ route('installation.update', ['installation' => $step]) }}" method="POST" class="space-y-3">
            @method('PUT')

            @csrf

            @forelse ($fields as $field)
                <x-installation::input
                    id="{{ $field }}"
                    name="{{ $field }}"
                    placeholder="{{ $field }}"
                    value="{{ $settings->firstWhere('key', $field)?->value }}"
                    label="{{ Str::replace('_', ' ', Str::ucfirst($field)) }}"
                    type="text"
                    autocomplete="false"
                    required
                />
            @empty
                <div class="space-y-3">
                    <p>{{ __('step.message_1') }}</p>
                    <p>{{ __('step.message_2') }}</p>
                    <p>{!! __('step.message_3', ['documentation_link' => 'https://retros.guide']) !!}</p>
                    <p>{{ __('step.message_4') }}</p>
                    <p class="italic font-semibold">{{ __('step.message_5') }}</p>
                </div>
            @endforelse

            @if ($settings->isEmpty())
                <x-installation::secondary-button>
                    {{ __('step.complete_button', ['hotel' => $name->value]) }}
                </x-installation::secondary-button>
            @else
                <x-installation::secondary-button>
                    {{ __('step.continue_button', ['step' => $step + 1]) }}
                </x-installation::secondary-button>
            @endif

        </form>

        <div class="flex gap-x-4">
            <form action="{{ route('installation.destroy', ['installation' => $step]) }}" method="POST"
                class="w-full mt-3">
                @method('DELETE')
                @csrf

                <x-installation::danger-button>
                    {{ __('step.restart_button') }}
                </x-installation::danger-button>
            </form>
        </div>
    </x-installation::card>
</x-installation-layout>
