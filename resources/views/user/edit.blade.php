@extends('layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>User Update</h1>
        <p>This is user update page.</p>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('user.update', ['id' => Crypt::encryptString($user->id)]) }}" method="POST"
                    class="form w-100">
                    @csrf
                    <div class="fv-row mb-3">
                        <div class="form-floating">
                            <input id="name" class="form-control bg-transparent @error('name') is-invalid @enderror"
                                type="name" placeholder="{{ __('Name') }}" name="name" required autocorrect="off"
                                autocomplete="off" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                    </div>
                    <div class="fv-row mb-3">
                        <div class="form-floating">
                            <input id="email" class="form-control bg-transparent @error('email') is-invalid @enderror"
                                type="email" placeholder="{{ __('Email') }}" name="email" required autocorrect="off"
                                autocomplete="off" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="email">{{ __('Email') }}</label>
                        </div>
                    </div>
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-2">
                            {{ __('Back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
