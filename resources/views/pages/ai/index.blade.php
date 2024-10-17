@extends('layouts.custom_layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Artificial Intelligence</h1>
        <p>This is Artificial Intelligence page.</p>
    </div>
    <div class="py-2">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('ai.processRequest') }}" method="POST" class="form w-100">
                    @csrf
                    @method('GET')

                    <div class="fv-row mb-3">
                        <div class="form-floating">
                            <input id="data" class="form-control bg-transparent" type="text"
                                placeholder="{{ __('Input') }}" name="data" autocorrect="off" autocomplete="off">
                            <label for="data">{{ __('Input') }}</label>
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
                </form>
                <div class="mt-4 p-3 border rounded bg-light">
                    @if (isset($data) && isset($data['candidates']))
                        @foreach ($data['candidates'] as $item)
                            @if (isset($item['content']['parts']))
                                @foreach ($item['content']['parts'] as $part)
                                    <p class="font-weight-semibold text-xl text-dark">Result:
                                        <span class="font-weight-bold text-primary">
                                            {!! $part['text'] !!} <!-- Render HTML directly -->
                                        </span>
                                    </p>
                                @endforeach
                            @endif
                        @endforeach
                    @elseif(isset($error))
                        <p class="font-weight-semibold text-xl text-dark">Error:
                            <span class="font-weight-bold text-primary">
                                {{ $error }}
                            </span>
                        </p>
                    @else
                        <p class="font-weight-semibold text-xl text-dark">Result:
                            <span class="font-weight-bold text-primary">
                                no data
                            </span>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function resetForm() {
            let baseUrl = "{{ route('ai.index') }}"; // Use the route directly
            window.location.href = baseUrl;
        }
    </script>
@endsection
