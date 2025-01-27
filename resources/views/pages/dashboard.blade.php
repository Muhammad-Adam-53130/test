@extends('layouts.custom_layouts.main')
@section('content')
    <div class="mt-4 text-center">
        <h1>Welcome</h1>
        <h2><strong>{{ $users->name }}</strong></h2>
        <p>This is my dashboard page.</p>
    </div>
@endsection
