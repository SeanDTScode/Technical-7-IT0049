<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSystemSeeder extends Seeder
{
    public function run(): void
    {
        $today = Carbon::today('Asia/Manila');

        Task::create([
            'title' => 'Prepare the daily task report',
            'status' => 'pending',
            'task_date' => $today,
        ]);

        Task::create([
            'title' => 'Review Laravel routes',
            'status' => 'in progress',
            'task_date' => $today,
        ]);

        Task::create([
            'title' => 'Submit the daily checklist',
            'status' => 'completed',
            'task_date' => $today,
        ]);

        Task::create([
            'title' => 'Design the database schema',
            'status' => 'completed',
            'task_date' => $today->copy()->subDay(),
        ]);

        Task::create([
            'title' => 'Create Eloquent models',
            'status' => 'completed',
            'task_date' => $today->copy()->subDay(),
        ]);

        Task::create([
            'title' => 'Read MVC notes',
            'status' => 'completed',
            'task_date' => $today->copy()->subDays(3),
        ]);

        Task::create([
            'title' => 'Study Blade templates',
            'status' => 'pending',
            'task_date' => $today->copy()->addDay(),
        ]);

        Task::create([
            'title' => 'Test the complete task list',
            'status' => 'pending',
            'task_date' => $today->copy()->addDays(2),
        ]);

        User::create([
            'username' => 'demo_user',
            'full_name' => 'Sean Daniel Sarmiento',
            'email' => 'demo@example.com',
            'created_at' => now('Asia/Manila'),
        ]);
    }
}