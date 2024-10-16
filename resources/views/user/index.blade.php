@extends('layouts.main')
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
                                                title="Show Feed" data-toggle="tooltip" data-placement="top" class="text-decoration-none text-uppercase">
                                                {{ $user->name }}
                                            </a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td class="d-flex flex-column flex-sm-row">
                                            <a href="{{ route('user.edit', ['id' => Crypt::encryptString($user->id)]) }}"
                                                class="btn btn-outline-primary flex-fill mb-2 mb-sm-0 me-sm-2">
                                                Edit
                                            </a>
                                            <a href="#" class="btn btn-outline-danger flex-fill" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{ $user->id }}"
                                                action="{{ route('user.destroy', ['id' => Crypt::encryptString($user->id)]) }}"
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="bg-white p-6 text-center uppercase font-black text-3xl">Users</h1>
                <div class="container mx-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="w-full bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @forelse($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $user->id }}</td>
                                <td class="py-3 px-6">{{ $user->name }}</td>
                                <td class="py-3 px-6">{{ $user->email }}</td>
                                <td class="py-3 px-6">
                                    <a href="#" class="text-blue-500 hover:underline">Edit</a>
                                    <a href="#" class="text-red-500 hover:underline ml-2">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-3 py-2 text-center">Data Not Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
