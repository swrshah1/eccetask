<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

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

        $validate = $request->validate([
            'taskcontent' => 'required|max:255',
        ]);

        $task = Task::find($id);

        $task = Task::find($id);

        $task->taskitem = $request['taskcontent'];
        $task->update();
        return redirect('/');
    }
}




