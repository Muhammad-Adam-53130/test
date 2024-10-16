@extends('layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Feeds</h1>
        <p>This is feeds page.</p>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-end mb-3">
                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                            {{ __('Back') }}
                        </a>
                    </div>

                    <div class="row">
                        @forelse ($feeds as $feed)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0" style="background-color: #f8f9fa;">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">{{ $feed->title }}</h5>
                                        <p class="card-text">{{ $feed->description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if ($feed->updated_at != $feed->created_at)
                                                <span class="text-muted"><i>Edited {{ $feed->updated_at->diffForHumans() }}</i></span>
                                            @else
                                                <span class="text-muted">{{ $feed->created_at->diffForHumans() }}</span>
                                            @endif
                                            @if (Auth::id() == $feed->user_id)
                                                <div>
                                                    <a href="{{ route('feed.edit', ['id' => Crypt::encryptString($feed->id)]) }}"
                                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $feed->id }}').submit();">
                                                        Delete
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <form id="delete-form-{{ $feed->id }}"
                                            action="{{ route('feed.destroy', ['id' => Crypt::encryptString($feed->id)]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning" role="alert">
                                    {{ __('No feeds available.') }}
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-4">
                        {{ $feeds->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
