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
    return view('home');
});

Route::post('/task', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'taskitem' => 'required|max:30',
    ]);

    if($validator->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }

    $task = new Task;
    $task->taskitem = $request->taskitem;
    $task->save();
});

Route::delete('task/{id}', function ($id) {
    
});

