@extends('layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Form</h1>
        <p>This is form page.</p>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('form') }}" method="GET" class="form w-100">
                    @if ($name == 'kacang')
                        <a onclick="resetForm()" class="btn btn-secondary mt-2">
                            {{ __('Reset') }}
                        </a>
                        <p class="font-weight-semibold text-xl text-dark">
                            Haaa... what are you doing...?
                        </p>
                    @else
                        <div class="fv-row mb-3">
                            <div class="form-floating">
                                <input id="name"
                                    class="form-control bg-transparent @error('name') is-invalid @enderror" type="name"
                                    placeholder="{{ __('Input') }}" name="name" autocorrect="off"
                                    autocomplete="off">
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
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Form' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="bg-white p-6 text-center uppercase font-black text-3xl">Form</h1>
                <div class="container mx-auto p-6">
                    <div class="max-w-md mx-auto">
                        <form action="{{ route('form') }}" method="GET" class="flex flex-col items-center space-y-4">
                            @if ($name == 'kacang')
                                <button type="button" onclick="resetForm()" class="p-2 bg-transparent border-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white"
                                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                        <path
                                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                    </svg>
                                </button>
                                <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    Haaa... what are you doing...?
                                </p>
                            @else
                                <input type="text" name="name" placeholder="Enter your input"
                                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out text-center"
                                    autocomplete="off">
                                <button type="submit"
                                    class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200 ease-in-out">
                                    Submit
                                </button>
                                <button type="button" onclick="resetForm()" class="p-2 bg-transparent border-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white"
                                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                        <path
                                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                    </svg>
                                </button>
                            @endif
                        </form>
                        @if ($name != 'kacang')
                            <div class="mt-6 p-4 border rounded-md shadow-md bg-white dark:bg-gray-800">
                                <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    Result: <span class="font-bold text-blue-500">{{ $name ?? 'no data' }}</span>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function resetForm() {
        let baseUrl = "{{ route('form') }}"; // Use the route directly
        window.location.href = baseUrl;
    }
</script> --}}
