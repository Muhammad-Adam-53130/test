@extends('layouts.custom_layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Feed View</h1>
        <p>This is feed view page.</p>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form method="POST" class="form w-100">
                    @csrf
                    <div class="fv-row mb-3">
                        <div class="form-floating">
                            <textarea id="title" class="form-control bg-transparent @error('title') is-invalid @enderror"
                                placeholder="{{ __('Title') }}" name="title" required autocorrect="off" autocomplete="off" rows="1"
                                oninput="autoResize(this); updateCounterTitle(this)" disabled>{{ old('title', $feed->title) }}</textarea>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="title">{{ __('Title') }}</label>
                        </div>
                        <div id="counterTitle" class="badge">0 / 100 characters</div>
                    </div>
                    <div class="fv-row mb-3">
                        <div class="form-floating">
                            <textarea id="description" class="form-control bg-transparent @error('description') is-invalid @enderror"
                                placeholder="{{ __('Description') }}" name="description" required autocorrect="off" autocomplete="off"
                                rows="1" oninput="autoResize(this); updateCounterDesc(this)" disabled>{{ old('description', $feed->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="description">{{ __('Description') }}</label>
                        </div>
                        <div id="counterDesc" class="badge">0 / 300 characters</div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0" style="background-color: #f8f9fa;">
                            <div class="card-body">
                                @forelse ($tags as $tag)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input @error('tags') is-invalid @enderror" type="checkbox"
                                            id="tag_{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                                            {{ in_array($tag->id, $feed->tags->pluck('id')->toArray()) ? 'checked' : '' }}
                                            disabled style="pointer-events: none; opacity: 1;">
                                        <label class="form-check-label"
                                            for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                @empty
                                    <div class="alert alert-warning" role="alert">
                                        {{ __('No tags available.') }}
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="d-grid mb-10">
                        <a href="{{ route('feed.edit', ['id' => Crypt::encryptString($feed->id)]) }}"
                            class="btn btn-primary mt-2">Edit</a>
                        <a href="javascript:void(0);" class="btn btn-danger mt-2"
                            onclick="confirmDelete(event, {{ $feed->id }})">
                            Delete
                        </a>
                        <a href="{{ route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)]) }}"
                            class="btn btn-secondary mt-2">
                            {{ __('Back') }}
                        </a>
                    </div>
                    <form id="delete-form-{{ $feed->id }}"
                        action="{{ route('feed.destroy', ['id' => Crypt::encryptString($feed->id)]) }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </form>
            </div>
        </div>
    </div>
    <script>
        const maxCharsTitle = 100;
        const maxCharsDesc = 300;

        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        function updateCounterTitle(textarea) {
            const counter = document.getElementById('counterTitle');
            let characterCount = textarea.value.length;

            if (characterCount > maxCharsTitle) {
                textarea.value = textarea.value.substring(0, maxCharsTitle);
                characterCount = textarea.value.length;
            }

            counter.textContent = `${characterCount} / ${maxCharsTitle} characters`;
            counter.style.color = characterCount > maxCharsTitle - 20 ? 'red' : 'inherit';
        }

        function updateCounterDesc(textarea) {
            const counter = document.getElementById('counterDesc');
            let characterCount = textarea.value.length;

            if (characterCount > maxCharsDesc) {
                textarea.value = textarea.value.substring(0, maxCharsDesc);
                characterCount = textarea.value.length;
            }

            counter.textContent = `${characterCount} / ${maxCharsDesc} characters`;
            counter.style.color = characterCount > maxCharsDesc - 20 ? 'red' : 'inherit';
        }

        // Initialize counters and resize on page load
        document.addEventListener('DOMContentLoaded', function() {
            const titleTextarea = document.getElementById('title');
            const descriptionTextarea = document.getElementById('description');

            // Call update functions to set initial counters and resize
            updateCounterTitle(titleTextarea);
            autoResize(titleTextarea);

            updateCounterDesc(descriptionTextarea);
            autoResize(descriptionTextarea);
        });

        function confirmDelete(event, feedId) {
            // Prevent the link from navigating
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById('delete-form-' + feedId).submit();
                    Swal.fire(
                        'Deleted!',
                        'The feed has been deleted.',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Cancelled',
                        'The feed was not deleted.',
                        'info'
                    );
                }
            });
        }
    </script>
@endsection
