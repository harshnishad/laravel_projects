<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Http\Requests\TaskRequest; 
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new task.
     */
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    /**
     * Store a newly created task in the database.
     */
    public function store(TaskRequest $request, Project $project)
    {
        $task = new Task([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $project->tasks()->save($task);

        return redirect()->route('projects.show', $project)->with('success', 'Task added successfully.');
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in the database.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.show', $task->project_id)->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from the database.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Task deleted successfully.');
    }
}