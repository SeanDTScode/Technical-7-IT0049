@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
    <h1>Edit Customer</h1>

    @include('partials.errors')

    <form
        method="POST"
        action="{{ route('customers.update', $customer) }}"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $customer->full_name) }}"
                required
            >
        </div>

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $customer->email) }}"
                required
            >
        </div>

        <div>
            <label for="phone">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $customer->phone) }}"
            >
        </div>

        <button type="submit">Update Customer</button>
        <a href="{{ route('customers.index') }}">Cancel</a>
    </form>
@endsection