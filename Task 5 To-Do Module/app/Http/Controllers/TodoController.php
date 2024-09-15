<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LList;
use App\Models\Task;
class TodoController extends Controller
{
    public function index()
{
    $lists = LList::with('tasks')->get();
    return view('todo.index', compact('lists'));
}

public function storeList(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'date' => 'required|date',
    ]);

    LList::create($request->all());
    return redirect()->back();
}

public function storeTask(Request $request, $listId)
{
    $request->validate([
        'task' => 'required|string',
    ]);

    Task::create([
        'list_id' => $listId,
        'task' => $request->task,
    ]);

    return redirect()->back();
}

public function updateTask(Request $request, $id)
{
   
    $request->validate([
        'completed' => 'boolean',
    ]);

   
    $task = Task::findOrFail($id);

  
    $task->completed = $request->input('completed', false);
    $task->save();

    
    return redirect()->route('todo.index')->with('success', 'Task updated successfully!');
}


public function deleteTask($taskId)
{
    Task::find($taskId)->delete();
    return redirect()->back();
}

public function deleteList($listId)
{
    LList::find($listId)->delete();
    return redirect()->back();
}

public function editList($id)
{
    $list = LList::findOrFail($id); 
    return view('todo.editList', compact('list')); 
}

public function updateList(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'date' => 'required|date',
    ]);

    $list = LList::findOrFail($id);
    $list->update($request->all());
    return redirect()->route('todo.index')->with('success', 'List updated successfully!');
}

public function editTask($id)
{
    $task = Task::findOrFail($id); 
    return view('todo.editTask', compact('task')); 
}




}
