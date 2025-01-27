@extends('layouts.custom_layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Form</h1>
        <p>This is form page.</p>
    </div>
    <div class="py-2">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('form') }}" method="GET" class="form w-100">
                    @if ($name == 'kacang')
                        <div class="d-grid mb-10">
                            <a onclick="resetForm()" class="btn btn-secondary mt-2">
                                {{ __('Reset') }}
                            </a>
                            <p class="font-weight-semibold text-xl text-dark text-center mt-4">
                                Haaa... what are you doing...?
                            </p>
                        </div>
                    @else
                        <div class="fv-row mb-3">
                            <div class="form-floating">
                                <input id="name"
                                    class="form-control bg-transparent @error('name') is-invalid @enderror" type="name"
                                    placeholder="{{ __('Input') }}" name="name" autocorrect="off" autocomplete="off">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label for="name">{{ __('Input') }}</label>
                            </div>
                        </div>
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                            <a onclick="resetForm()" class="btn btn-secondary mt-2">
                                {{ __('Reset') }}
                            </a>
                        </div>
                    @endif
                </form>
                @if ($name != 'kacang')
                    <div class="mt-4 p-3 border rounded bg-light">
                        <p class="font-weight-semibold text-xl text-dark">
                            Result: <span class="font-weight-bold text-primary">{{ $name ?? 'no data' }}</span>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function resetForm() {
            let baseUrl = "{{ route('form') }}"; // Use the route directly
            window.location.href = baseUrl;
        }
    </script>
@endsection
