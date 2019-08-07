@extends('layout')
@section('body')
@include('common.errors')

        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    To-do app
                </div>

            <form action="/task" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="formGroupExampleInput">To-do list item:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" size="150" name="taskitem">
                  </div>
                  <button type="submit" class=" btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">


                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>


                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>


                                <td class="table-text">
                                    <div>{{ $task->taskitem }}</div>
                                </td>

                                <td>
                                    <form action="/task/{{ $task->id }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                   <button class="btn btn-danger delete" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="/sort" method="GET">
                     <button class="btn btn-dark">Sort by desc</button>
                </form>
                <form action="/task" method="POST">

                    <button class="btn btn-light"><a href="/">Sort by asc</button>
                </form>
            </div>
        </div>
    @endif
        </div>
@endsection
