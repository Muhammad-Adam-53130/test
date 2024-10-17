@extends('layouts.custom_layouts.front')
@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4"><a a href="/" class="text-decoration-none">{{ __('Login') }}</a></h5>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="fv-row mb-3">
                                    <div class="form-floating">
                                        <input id="email" class="form-control bg-transparent @error('email') is-invalid @enderror"
                                            type="email" placeholder="{{ __('Email') }}" name="email" required autofocus autocorrect="off"
                                            autocomplete="username">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="email">{{ __('Email') }}</label>
                                    </div>
                                </div>

                                <div class="fv-row mb-3">
                                    <div class="form-floating">
                                        <input id="password" class="form-control bg-transparent @error('email') is-invalid @enderror"
                                            type="password" placeholder="{{ __('Password') }}" name="password" required autofocus autocorrect="off"
                                            autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="password">{{ __('Password') }}</label>
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <input id="remember_me" class="form-check-input" type="checkbox" name="remember" />
                                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                                </div>

                                <div class="d-flex justify-content-between">
                                    @if (Route::has('password.request'))
                                        <a class="text-muted" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Log in') }}
                                    </button>
                                </div>
                                <a class="text-muted" href="{{ route('register') }}">
                                    {{ __('Yet to registered?') }}
                                </a>
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

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
