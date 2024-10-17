@extends('layouts.custom_layouts.front')
@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4"><a a href="/" class="text-decoration-none">{{ __('Register') }}</a></h5>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="fv-row mb-3">
                                    <div class="form-floating">
                                        <input id="name" class="form-control bg-transparent @error('name') is-invalid @enderror"
                                            type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus autocorrect="off"
                                            autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="name">{{ __('Name') }}</label>
                                    </div>
                                </div>

                                <div class="fv-row mb-3">
                                    <div class="form-floating">
                                        <input id="email" class="form-control bg-transparent @error('email') is-invalid @enderror"
                                            type="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" required autofocus autocorrect="off"
                                            autocomplete="username">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="email">{{ __('Email') }}</label>
                                    </div>
                                </div>

                                <div class="fv-row mb-3">
                                    <div class="form-floating">
                                        <input id="password" class="form-control bg-transparent @error('password') is-invalid @enderror"
                                            type="password" placeholder="{{ __('Password') }}" name="password" required autofocus autocorrect="off"
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="password">{{ __('Password') }}</label>
                                    </div>
                                </div>

                                <div class="fv-row mb-3">
                                    <div class="form-floating">
                                        <input id="password_confirmation" class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror"
                                            type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autofocus autocorrect="off"
                                            autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    </div>
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mb-3 form-check">
                                        <input id="terms" class="form-check-input" type="checkbox" name="terms"
                                            required />
                                        <label for="terms" class="form-check-label">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="text-decoration-underline">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="text-decoration-underline">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </label>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between">
                                    <a class="text-muted" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
