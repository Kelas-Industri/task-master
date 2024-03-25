<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules for your form fields
        ]);

        // Create Task
        $task = new Task();
        $task->employee = $request->employee;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->category = $request->category;
        $task->sub_category = $request->sub_category;
        $task->date_start = $request->date_start;
        $task->date_end = $request->date_end;
        $task->status = 'In Progress'; // Set default status
        $task->creator = Auth::user()->email; // Get the logged-in user's email
        $task->save();

        // Redirect to the task index page
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        $historyProgress = TaskProgress::where('task_id', $id)->get();
        $historyApprovals = TaskApproval::where('task_id', $id)->get();
        return view('tasks.show', compact('task', 'historyProgress', 'historyApprovals'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Validation rules for your form fields
        ]);

        $task = Task::findOrFail($id);
        $task->employee = $request->employee;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->category = $request->category;
        $task->sub_category = $request->sub_category;
        $task->date_start = $request->date_start;
        $task->date_end = $request->date_end;
        $task->status = $request->status;
        $task->creator = $request->creator;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
