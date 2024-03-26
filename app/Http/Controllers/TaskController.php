<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('employeeDetail')->paginate();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        if (auth()->user()->role != 'Manager') {
            return redirect()->back()->with('error', 'Don`t have permissions');
        }

        $employees = User::where('role', 'Staff')->get();

        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role != 'Manager') {
            return redirect()->back()->with('error', 'Don`t have permissions');
        }

        $request->validate([
            'employee' => 'required|exists:users,email',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'sub_category' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'evidence' => 'nullable|max:10240',
        ]);

        // Handle file upload for evidence
        $evidencePath = null;
        if ($request->hasFile('evidence')) {
            $evidencePath = $request->file('evidence')->store('public/evidence');
            // Replace 'public' with 'public_path()' to get the absolute path
            $evidencePath = str_replace('public', 'storage', $evidencePath);
        }

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
        $task->creator = auth()->user()->email; // Get the logged-in user's email
        $task->evidence = $evidencePath; // Save evidence file path
        $task->save();

        # notification

        // Redirect to the task index page
        return redirect()->route('task.index')->with('success', 'Task created successfully.');
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
        if (auth()->user()->role != 'Manager') {
            return back()->with(['error' => 'Sorry, you don`t have permissions.']);
        }

        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
