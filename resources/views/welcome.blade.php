@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Tasks for Today</h1>

    <p>{{ $today->format('F j, Y') }}</p>

    @if ($tasks->isEmpty())
        <p>There are no tasks scheduled for today.</p>
    @else
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ ucfirst($task->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection