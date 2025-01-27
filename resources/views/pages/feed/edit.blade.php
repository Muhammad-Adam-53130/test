@extends('layouts.custom_layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Feed Update</h1>
        <p>This is feed update page.</p>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('feed.update', ['id' => Crypt::encryptString($feed->id)]) }}" method="POST"
                    class="form w-100">
                    @csrf
                    <div class="fv-row mb-3">
                        <div class="form-floating">
                            <textarea id="title" class="form-control bg-transparent @error('title') is-invalid @enderror"
                                placeholder="{{ __('Title') }}" name="title" required autocorrect="off" autocomplete="off" rows="1"
                                oninput="autoResize(this); updateCounterTitle(this)">{{ old('title', $feed->title) }}</textarea>
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
                                rows="1" oninput="autoResize(this); updateCounterDesc(this)">{{ old('description', $feed->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label for="description">{{ __('Description') }}</label>
                        </div>
                        <div id="counterDesc" class="badge">0 / 300 characters</div>
                    </div>
                    @forelse ($tags as $tag)
                        <div class="fv-row mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('tags') is-invalid @enderror" type="checkbox"
                                    id="tag_{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                                    {{ in_array($tag->id, $feed->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                @error('tags')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        </div>
                    @empty
                        <p>No tags available</p>
                    @endforelse
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <a href="{{ route('feed.index', ['user_id' => Crypt::encryptString($feed->user_id)]) }}"
                            class="btn btn-secondary mt-2">
                            {{ __('Back') }}
                        </a>
                    </div>
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
    </script>
@endsection
