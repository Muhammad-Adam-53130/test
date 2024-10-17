@if ($errors->any())
    <div {{ $attributes }} class="alert alert-danger">
        <strong>{{ __('Whoops! Something went wrong.') }}</strong>

        <ul class="mt-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
