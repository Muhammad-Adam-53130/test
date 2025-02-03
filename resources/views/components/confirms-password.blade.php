@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<!-- Modal -->
<div class="modal fade" id="confirmPasswordModal" tabindex="-1" aria-labelledby="confirmPasswordModalLabel" aria-hidden="true"
    x-data="{ showModal: @entangle('confirmingPassword') }" 
    x-show="showModal" 
    x-init="
        $watch('showModal', value => {
            if (value) {
                var modal = new bootstrap.Modal(document.getElementById('confirmPasswordModal'));
                modal.show();
            } else {
                var modal = bootstrap.Modal.getInstance(document.getElementById('confirmPasswordModal'));
                if (modal) modal.hide();
            }
        })
    ">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmPasswordModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close" aria-label="Close" @click="showModal = false; $wire.stopConfirmingPassword();"></button>
            </div>
            <div class="modal-body">
                {{ $content }}
                <div class="mt-3">
                    <input type="password" class="form-control" placeholder="{{ __('Password') }}" autocomplete="current-password"
                        x-ref="confirmable_password"
                        wire:model="confirmablePassword"
                        wire:keydown.enter="confirmPassword" />
                    <x-input-error for="confirmable_password" class="text-danger mt-2" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="showModal = false; $wire.stopConfirmingPassword();">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-primary ms-3" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
                    {{ $button }}
                </button>
            </div>
        </div>
    </div>
</div>
@endonce
