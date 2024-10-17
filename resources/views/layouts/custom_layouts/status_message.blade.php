@if(session('information'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-shield"></i> <!-- Use appropriate icon class -->
        <strong>{{ __('Information!') }}</strong> 
        {!! session('information') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-shield"></i>
        <strong>{{ __('Success!') }}</strong> 
        {!! session('success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="bi bi-shield"></i>
        <strong>{{ __('Warning!') }}</strong> 
        {!! session('warning') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-shield"></i>
        <strong>{{ __('Error!') }}</strong> 
        {!! session('error') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
