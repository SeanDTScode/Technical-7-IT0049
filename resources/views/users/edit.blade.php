@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>

    @include('partials.errors')

    <form
        method="POST"
        action="{{ route('users.update', $user) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->username) }}"
                required
            >
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $user->full_name) }}"
                required
            >
        </div>

        <div>
            <label for="avatar">Profile Picture</label>
            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png"
            >

            <p>JPG or PNG only. Maximum size: 2MB.</p>
        </div>

        @if ($user->avatar)
            <div>
                <p>Current avatar:</p>

                <img
                    src="{{ asset('storage/' . $user->avatar) }}"
                    alt="{{ $user->full_name }} avatar"
                    width="100"
                    height="100"
                >
            </div>
        @endif

        <button type="submit">Update User</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
@endsection