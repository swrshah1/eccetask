<?php

use App\Task; 
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $tasks = Task::orderBy ('created_at', 'asc')->get();

    return view('task', [
        'tasks' => $tasks,
    ]);
});

Route::post('/task', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'taskitem' => 'required|max:255',
    ]);

    if($validator->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }

    $task = new Task;
    $task->taskitem = $request->taskitem;
    $task->save();

    return redirect('/')->with('message', 'The list item has been stored');
});

Route::delete('task/{id}', function ($id) {
    Task::findOrFail($id)->delete();
    return redirect('/')->with('message', 'The selected item was successfully deleted');
});

