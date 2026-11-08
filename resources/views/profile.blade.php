@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>User Profile</h1>

    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Full Name:</strong> {{ $user->full_name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
@endsection