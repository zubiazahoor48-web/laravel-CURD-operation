<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'Task_name' => 'required',
            'Description' => 'required'
        ]);

        Task::create([
            'Task_name' => $request->Task_name,
            'Description' => $request->Description,
        ]);

        return redirect('/task');
    }
    public function index() 
    {
        $tasks = Task::all();

        return view('task', compact('tasks'));
    }
       public function edit($id) 
    {
        $task = Task::findOrFail($id);
        $tasks = Task::all();

        return view('task', compact('tasks', 'task'));
    }
    public function update(Request $request, $id)
  {      $request->validate([
            'Task_name' => 'required',
            'Description' => 'required'
        ]);

        $task = Task::findOrFail($id);

        $task->Task_name = $request->Task_name;
        $task->Description = $request->Description;

        $task->save();

        return redirect('/task');
    }
    Public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/task');
    }
}