@extends('layout')

@section('body')

<div class="container">

            
            <div class="my-3">
      
              @if (isset($task))
      
                <h3 class="text-center">Edit task #{{ $task->id }}</h3>
      
                <form action="/task/{{ $task->id }}" method="POST">
                  {{ csrf_field() }}
      
                  {{ method_field('PUT') }}
      
                  <div class="form-group">
                    <label for="task-content" class="control-label">To-do item</label>
                    <textarea name="taskcontent" 
                              class="form-control" 
                              rows="1"  
                              required>{{ $task->taskitem }}</textarea> 
                  </div>
      

      
                  <div class="form-group">
                    <p>Created: {{ $task->created_at }}</p>
                    <p>Last modified: {{ $task->updated_at }}</p>
                  </div>
      
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              @else
              <p class="text-center">To-do item does not exist.</p>
              @endif
      
            </div>
      
          </div>
        </div>
      </div>
    
@endsection