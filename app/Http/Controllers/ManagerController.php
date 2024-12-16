<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class ManagerController extends Controller
{
    public function index()
    {
        $task=Task::all();
        return response()->json($task, 200);
    }

    public function store(StoreTaskRequest $request)
    {
        $task=Task::create($request->validated());
        return response()->json($task, 201);
    }

    public function show(int $id)
    {
        $task=Task::findOrFail($id);
        return response()->json($task, 200);
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        $task=Task::findOrFail($id);
         $task->update($request->validated());
         return response()->json($task, 200);
    }

    public function destroy(int $id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
