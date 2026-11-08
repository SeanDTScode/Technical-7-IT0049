<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Carbon;

class WelcomeController extends Controller
{
    public function index()
    {
        $today = Carbon::today('Asia/Manila');

        $tasks = Task::whereDate('task_date', $today)
            ->orderBy('title')
            ->get();

        return view('welcome', compact('tasks', 'today'));
    }
}