@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <h1>Create User</h1>

    @include('partials.errors')

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div>
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                required
            >
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name') }}"
                required
            >
        </div>

        <button type="submit">Save User</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
@endsection