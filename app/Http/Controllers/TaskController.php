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
        $active = null;

        if ($request->type == 'all') {
            $tasks = Task::all();
            $active = 'all';
        }

        return Inertia::render('Home', [
            'tasks' => Task::all(),
            'active' => 'all'
        ]);
    }

    public function store(Request $request) {
        $result = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|max:65535',
            'date' => 'required|date',
            'completed' => 'required|boolean',
            'important' => 'required|boolean'
        ]);

        $result['user_id'] = auth()->id();
        return $task = Task::create($result);
    }
}
