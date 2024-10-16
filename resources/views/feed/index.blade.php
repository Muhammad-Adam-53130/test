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
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">
                            {{ __('Back') }}
                        </a>
                    </div>

                    <div class="row">
                        @forelse ($feeds as $feed)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">{{ $feed->title }}</h5>
                                        <p class="card-text">{{ $feed->description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">{{ $feed->created_at->diffForHumans() }}</span>
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
{{-- <div class="table-responsive">
                        <table class="table table-hover gy-4 table-rounded table-row-bordered table-row-gray-200">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    @if ($feeds->where('user_id', Auth::id())->isNotEmpty())
                                        <th class="text-end col-2">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($feeds as $feed)
                                    <tr>
                                        <td>{{ $feed->title }}</td>
                                        <td>{{ $feed->description }}</td>
                                        @if (Auth::id() == $feed->user_id)
                                            <td class="d-flex flex-column flex-sm-row">
                                                <!-- Edit Feed Button -->
                                                <a href="{{ route('feed.edit', ['id' => Crypt::encryptString($feed->id)]) }}"
                                                    class="btn btn-primary flex-fill mb-2 mb-sm-0 me-sm-2" title="Edit Feed"
                                                    data-toggle="tooltip" data-placement="top">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Feed Button -->
                                                <a href="#" class="btn btn-danger flex-fill" title="Delete Feed"
                                                    data-toggle="tooltip" data-placement="top"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $feed->id }}').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Form -->
                                                <form id="delete-form-{{ $feed->id }}"
                                                    action="{{ route('feed.destroy', ['id' => Crypt::encryptString($feed->id)]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    @if ($feeds->where('user_id', Auth::id())->isNotEmpty())
                                        <tr>
                                            <td colspan="3" class="text-center">Data Not Found</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">Data Not Found</td>
                                        </tr>
                                    @endif
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-end">
                        {{ $feeds->links('pagination::bootstrap-4') }}
                    </div> --}}
