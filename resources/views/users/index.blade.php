@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
    <h1>User Accounts</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ route('users.create') }}">
            Create User
        </a>
    </p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                @php
                    $avatarUrl = $user->avatar
                        ? asset('storage/' . $user->avatar)
                        : asset('images/avatar-placeholder.svg');
                @endphp

                <tr>
                    <td>
                        <img
                            src="{{ $avatarUrl }}"
                            alt="{{ $user->full_name }} avatar"
                            width="70"
                            height="70"
                        >
                    </td>

                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>

                    <td>
                        <a href="{{ route('users.edit', $user) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection