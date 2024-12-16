<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $task=Task::all();
        return response()->json($task, 200);
    }

    public function store(StoreTaskRequest $request)
    {
        //////validated/////////////
        // $validatedDate=$request->validate([
        //     'title' => 'required|string|max:40',
        //     'description' => 'required|string',
        //     'priority' => 'required|integer|min:1|max:10'
        // ]);
        // $task=Task::create($validatedDate);
        // return response()->json($task, 201);

        ///////////Form Request////////////
        $task=Task::create($request->validated());
        return response()->json($task, 201);

        // $task=Task::create([
        //     'title' => $request -> title,
        //     'description' => $request -> description,
        //     'priority' => $request -> priority
        // ]);
        // return response()->json($task, 201);

        // $task = new Task;
        //     $task -> title = $request -> title;
        //     $task -> description = $request -> description;
        //     $task -> priority = $request -> priority;
        // $task->save();
        // return response()->json($task, 201);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        //////validated/////////////
        // $task=Task::findOrFail($id);
        // $validatedDate=$request->validate([
        //     'title' => 'sometimes|string|max:40',
        //     'description' => 'sometimes|string',
        //     'priority' => 'sometimes|integer|min:1|max:10'
        // ]);
        // $task->update($validatedDate);
        //  return response()->json($task, 200);

         ///////////Form Request//////////////
         $task=Task::findOrFail($id);
         $task->update($request->validated());
         return response()->json($task, 200);

        // $task=Task::findOrFail($id);
        // $task->update($request->only('title','description','priority'));
        // return response()->json($task, 200);

        // $task=Task::findOrFail($id);
        //     $task -> title = $request;
        //     $task -> description = $request;
        //     $task -> priority = $request;
        // $task->save();
        // return response()->json($task, 200);

        // $task = Task::updateOrCreate([
        //     'title' => $request,
        //     'description' => $request,
        //     'priority' => $request
        // ]);
        // $task->save();
        // return response()->json($task, 200);
    }

    public function show($id)
    {
        $task=Task::findOrFail($id);
        return response()->json($task, 200);
    }

    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
