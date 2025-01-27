@extends('layouts.custom_layouts.front')
@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="flex-grow-1 d-flex align-items-center justify-content-center bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-lg border-0 rounded-3">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4"><a a href="/"
                                        class="text-decoration-none">{{ __('Register') }}</a></h5>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="fv-row mb-3">
                                        <div class="form-floating">
                                            <input id="name"
                                                class="form-control bg-transparent @error('name') is-invalid @enderror"
                                                type="text" placeholder="{{ __('Name') }}" name="name"
                                                value="{{ old('name') }}" required autofocus autocorrect="off"
                                                autocomplete="name">
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <label for="name">{{ __('Name') }}</label>
                                        </div>
                                    </div>

                                    <div class="fv-row mb-3">
                                        <div class="form-floating">
                                            <input id="email"
                                                class="form-control bg-transparent @error('email') is-invalid @enderror"
                                                type="email" placeholder="{{ __('Email') }}" name="email"
                                                value="{{ old('email') }}" required autofocus autocorrect="off"
                                                autocomplete="username">
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <label for="email">{{ __('Email') }}</label>
                                        </div>
                                    </div>

                                    <div class="fv-row mb-3">
                                        <div class="form-floating">
                                            <input id="password"
                                                class="form-control bg-transparent @error('password') is-invalid @enderror"
                                                type="password" placeholder="{{ __('Password') }}" name="password" required
                                                autofocus autocorrect="off" autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <label for="password">{{ __('Password') }}</label>
                                        </div>
                                    </div>

                                    <div class="fv-row mb-3">
                                        <div class="form-floating">
                                            <input id="password_confirmation"
                                                class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror"
                                                type="password" placeholder="{{ __('Confirm Password') }}"
                                                name="password_confirmation" required autofocus autocorrect="off"
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
        @include('components.custom_components.footer')
    </div>
@endsection
