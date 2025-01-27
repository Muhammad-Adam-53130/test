@extends('layouts.custom_layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Users</h1>
        <p>This is users page.</p>
    </div>
    <div class="py-2">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <a href="{{ route('feed.create') }}" class="btn btn-outline-primary mb-2 me-2">
                            {{ __('Add New Feed') }}
                        </a>
                        <a href="{{ route('user.create') }}" class="btn btn-outline-primary mb-2">
                            {{ __('Add New User') }}
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover gy-4 table-rounded table-row-bordered table-row-gray-200">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="text-end col-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('feed.index', ['user_id' => Crypt::encryptString($user->id)]) }}"
                                                title="Show Feed" data-toggle="tooltip" data-placement="top"
                                                class="text-decoration-none text-uppercase">
                                                {{ $user->name }}
                                            </a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td class="d-flex flex-column flex-sm-row">
                                            <a href="{{ route('user.edit', ['id' => Crypt::encryptString($user->id)]) }}"
                                                class="btn btn-outline-primary flex-fill mb-2 mb-sm-0 me-sm-2">
                                                Edit
                                            </a>
                                            @if (auth()->user()->id !== $user->id)
                                                <a href="javascript:void(0);" class="btn btn-outline-danger flex-fill"
                                                    onclick="confirmDelete(event, {{ $user->id }})">
                                                    Delete
                                                </a>
                                                <form id="delete-form-{{ $user->id }}"
                                                    action="{{ route('user.destroy', ['id' => Crypt::encryptString($user->id)]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endif
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function confirmDelete(event, userId) {
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
                document.getElementById('delete-form-' + userId).submit();
                Swal.fire(
                    'Deleted!',
                    'The user has been deleted.',
                    'success'
                );
            } else {
                Swal.fire(
                    'Cancelled',
                    'The user was not deleted.',
                    'info'
                );
            }
        });
    }
</script>
