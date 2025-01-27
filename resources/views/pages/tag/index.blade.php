@extends('layouts.custom_layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Tags</h1>
        <p>This is tags page.</p>
    </div>
    <div class="py-2">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <a href="{{ route('tag.create') }}" class="btn btn-outline-primary mb-2">
                            {{ __('Add New Tag') }}
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover gy-4 table-rounded table-row-bordered table-row-gray-200">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tags as $index => $tag)
                                    <tr>
                                        <td>{{ $index + 1 }}.</td>
                                        <td>
                                            {{ $tag->name }}
                                            <br>
                                            <span>
                                                @if ($tag->updated_at != $tag->created_at)
                                                    <span class="text-muted"><i>Edited
                                                            {{ $tag->updated_at->diffForHumans() }}</i></span>
                                                @else
                                                    <span class="text-muted">{{ $tag->created_at->diffForHumans() }}</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-outline-danger"
                                                onclick="confirmDelete(event, {{ $tag->id }})">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $tag->id }}"
                                                action="{{ route('tag.destroy', ['id' => Crypt::encryptString($tag->id)]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Not Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function confirmDelete(event, tagId) {
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
                document.getElementById('delete-form-' + tagId).submit();
                Swal.fire(
                    'Deleted!',
                    'The tag has been deleted.',
                    'success'
                );
            } else {
                Swal.fire(
                    'Cancelled',
                    'The tag was not deleted.',
                    'info'
                );
            }
        });
    }
</script>
