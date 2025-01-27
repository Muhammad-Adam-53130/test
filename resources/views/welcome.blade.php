@extends('layouts.custom_layouts.front')
@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="flex-grow-1 d-flex align-items-center justify-content-center bg-light">
            @if (Route::has('login'))
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-lg border-0 rounded-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">{{ __('Welcome Page') }}</h5>
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="btn btn-primary w-100 mb-2">
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">
                                            Log in
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-secondary w-100">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @include('components.custom_components.footer')
    </div>
@endsection
