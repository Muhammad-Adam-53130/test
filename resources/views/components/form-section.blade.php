@props(['submit'])

<div {{ $attributes->merge(['class' => 'card-body p-9']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form class="needs-validation" wire:submit="{{ $submit }}">
            {{ $form }}

            @if (isset($actions))
                {{ $actions }}
            @endif
        </form>
    </div>
</div>
