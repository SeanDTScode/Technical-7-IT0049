@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <h1>Complete Task List</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Task Date</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ ucfirst($task->status) }}</td>
                    <td>{{ $task->task_date->format('F j, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection