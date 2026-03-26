<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Helpers\ApiResponse;


class ProjectController extends Controller
{

public function store(Request $req)
{
    $req->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string'
    ]);

    $project = Project::create([
        'title' => $req->title,
        'description' => $req->description,
        'created_by' => $req->user()->id
    ]);

    return ApiResponse::success($project, "Project created", 201);
}
public function update(Request $req, $id)
{
    $req->validate([
        'title' => 'sometimes|string|max:255',
        'description' => 'nullable|string'
    ]);

    $project = Project::findOrFail($id);

    if ($project->created_by != $req->user()->id) {
        return ApiResponse::error("Forbidden", 403);
    }

    $project->update($req->all());

    return ApiResponse::success($project, "Project updated");
}
}
