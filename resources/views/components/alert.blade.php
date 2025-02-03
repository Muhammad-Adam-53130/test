<div {{ $attributes->merge(['class' => 'alert alert-dismissible d-flex flex-column flex-sm-row align-items-center p-5']) }}>
    <i class="ki-duotone ki-{{ $icon }} fs-2hx text-{{ $alert_type }} me-4">
        <span class="path1"></span>
        <span class="path2"></span>
    </i>
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <h4 class="mb-1 text-{{ $alert_type }}">
            {{ $title }}
        </h4>
        <span>
            {{ $content }}
        </span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </button>
</div>
