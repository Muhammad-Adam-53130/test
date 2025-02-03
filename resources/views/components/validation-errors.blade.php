@if ($errors->any())
    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10" {{ $attributes }}>
        <i class="ki-duotone ki-information fs-2hx text-light me-4 mb-5 mb-sm-0">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>

        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
            <h4 class="mb-2 text-light">
                {{ __('Ralat. Sila cuba sekali lagi.') }}
            </h4>
            <hr />
            <span>
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </span>
        </div>
    </div>
@endif
