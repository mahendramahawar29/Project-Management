<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Helpers\ApiResponse;

class TaskController extends Controller
{
    public function index(Request $req)
    {
        $query = Task::query();

        if ($req->status) {
            $query->where('status', $req->status);
        }

        if ($req->assigned_to) {
            $query->where('assigned_to', $req->assigned_to);
        }

        if ($req->due_date) {
            $query->whereDate('due_date', $req->due_date);
        }

        $tasks = $query->get();

        return ApiResponse::success($tasks, "Tasks fetched");
    }

public function store(Request $req)
{
    $req->validate([
        'project_id' => 'required|exists:projects,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'in:pending,in-progress,completed',
        'assigned_to' => 'nullable|exists:users,id',
        'due_date' => 'nullable|date'
    ]);

    $task = Task::create($req->all());

    return ApiResponse::success($task, "Task created", 201);
}

public function update(Request $req, $id)
{
    $req->validate([
        'title' => 'sometimes|string|max:255',
        'description' => 'nullable|string',
        'status' => 'in:pending,in-progress,completed',
        'assigned_to' => 'nullable|exists:users,id',
        'due_date' => 'nullable|date'
    ]);

    $task = Task::findOrFail($id);

    if (
        $task->assigned_to != $req->user()->id &&
        $task->project->created_by != $req->user()->id
    ) {
        return ApiResponse::error("Forbidden", 403);
    }

    $task->update($req->all());

    return ApiResponse::success($task, "Task updated");
}
}
