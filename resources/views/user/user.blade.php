@extends('layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Users</h1>
        <p>This is users page.</p>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-2 float-end">Create</a>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', ['id' => Crypt::encryptString($user->id)]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('users.destroy', ['id' => Crypt::encryptString($user->id)]) }}" class="btn btn-danger mt-2 d-sm-inline">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Not Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
