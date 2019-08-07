<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;

class TaskController extends Controller
{
    public function getItembyId($id)
    {
        $task = new Task();
        $item = $task->find($id);
        return view('edit', ['task' => $item]);
    }

    public function updateItem($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'taskcontent' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        $task = Task::find($id);

        $task = Task::find($id);

        $task->taskitem = $request['taskcontent'];
        $task->update();
        return redirect('/')->with('message', 'Task item updated successfully');
    }

    public function restoreItem($id)
    {
        
        $task = Task::onlyTrashed()->find($id);
        $task->restore();

        return redirect('/')->with('message', 'The item was successfully restored');
    }

    public function permDelete($id, Request $request) 
    {
    
       $task = Task::withTrashed()->where('id', $id)->first();
       $task->forceDelete();

       return redirect('/')->with('message', 'The item was permanently deleted');

        
        
    }
}




