<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\AbstractList;

class TaskController extends Controller
{
    public function store(Request $request){
        //dd($request->all());

        $task = new Task;
        $this->validate($request,['task'=>'required|max:100|min:5']);
        $task->task = $request->task;

        $task->save();

        $data=Task::all();
        //dd($data);

        //return redirect()->back();

        return view('tasks')->with('tasks',$data);
    }

    public function updateTaskAsMarked($id){
        $task=Task::find($id);
        $task->isCompleted=1;

        $task->save();

        return redirect()->back();
    }

    public function updateTaskAsNotMarked($id){
        $task=Task::find($id);
        $task->isCompleted=0;

        $task->save();

        return redirect()->back();
    }

    public function deleteTask($id){
        $task=Task::find($id);

        $task->delete();

        return redirect()->back();
    }

    public function updateTaskView($id){
        $task=Task::find($id);

        return view('/updatetask')->with('taskData',$task);
    }

    public function updateTask(Request $request){
        $id=$request->id;
        $task=$request->task;

        $data=Task::find($id);

        $data->task=$task;

        $data->save();

        $data=Task::all();

        return view('tasks')->with('tasks',$data);
    }
}
