<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = null;
        $active = 'all';
        $title = 'All tasks';

        if ($request->type == 'important') {
            $tasks = auth()->user()->importantTasks();
            $active = 'important';
            $title = 'Important tasks';
        }

        if($request->type == 'all') {
            $tasks = auth()->user()->tasks();
        }
        if($request->type == 'completed') {
            $tasks = auth()->user()->completedTasks();
            $active = 'completed';
            $title = 'Completed tasks';
        }
        if($request->type == 'toDoNow') {
            $tasks = auth()->user()->toDoNowtasks();
            $active = 'toDoNow';
            $title = 'Tasks to do today';
        }

        return Inertia::render('Home', [
            'tasks' => $tasks,
            'active' => $active,
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $result = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|max:65535',
            'date' => 'required|date',
            'completed' => 'required|boolean',
            'important' => 'required|boolean'
        ]);

        $result['user_id'] = auth()->id();
        Task::create($result);

        return back();
    }

    public function toggle(Task $task)
    {
        $task->update([
            'completed' => !$task->completed
        ]);
        return back();
    }

    public function delete(Task $task)
    {
        $task->delete();
        return back();
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return back();
    }

}
