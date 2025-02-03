@extends('layouts.custom_layouts.front')
@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="flex-grow-1 d-flex align-items-center justify-content-center bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-lg border-0 rounded-3">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">
                                    <a a href="/" class="text-decoration-none">{{ __('Forgot Password') }}</a>
                                </h5>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="fv-row mb-3">
                                        <div class="form-floating">
                                            <input id="email"
                                                class="form-control bg-transparent @error('email') is-invalid @enderror"
                                                type="email" placeholder="{{ __('Email') }}" name="email" required
                                                autofocus autocorrect="off" autocomplete="username">
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <label for="email">{{ __('Email') }}</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
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
