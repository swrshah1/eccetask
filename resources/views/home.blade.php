@extends('layout')
@section('body')
    

        <div class="flex-center position-ref full-height">
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

                <div class="links">
                    <a href="https://laravel.com/docs">To-do Items</a>
                </div>
            <form>
                <div class="form-group">
                    <label for="formGroupExampleInput">To-do list item:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" size="150" maxlength="15">
                  </div>
                  <button type="submit" class=" btn btn-primary">Submit</button>
                </div>
            </form>
                
            </div>
        </div>
@endsection