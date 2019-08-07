@extends('layout')
@section('body')
    @if ($tasks)
    <div class="content">
            <div class="title m-b-md">
                Recycle Bin
            </div>
    <div class="panel panel-default">
            <div class="panel-heading">
                View deleted tasks:
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
                                    <form action="/restore/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                       
                                   <button class="btn btn-dark" onclick="return confirm('Are you sure you wish to restore this item?')">Restore</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/delete/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                 
                                    <button class="btn btn-danger">Permanently delete</button>
                                    </form>
                                </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>    
        </div>
    @endif
@endsection