<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Psy\Command\EditCommand;
use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    public function show($id)
    {
        $task = Task::find($id);
        return view('task.show',compact('task'));
    }

    public function update(TaskRequest $request, $id)
    // フォームで送られたデータ、渡されたidをうけとる
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->body = $request->body;
        $task->timestamps = false;
        $task->save();
        return redirect('/tasks');
    }
    public function index()
    {
        $tasks = Task::all();
        return view('task.index',compact('tasks'));
    }
    public function store(TaskRequest $request)
    {
        $task = new Task;
        
        $task->title = $request->title;
        $task->body = $request->body;
        $task->timestamps = false;

        $task->save();
        return redirect('/tasks');
    }
    public function edit($id)
    { 
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks');
    }
    


}
