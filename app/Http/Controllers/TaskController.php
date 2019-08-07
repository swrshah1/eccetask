<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function getItembyId($id) {
        $task = new Task();
        $item = $task->find($id);
        return view('edit', ['task' => $item]);
    }
}
