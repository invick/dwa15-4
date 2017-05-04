@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Your tasks list</span>
                        <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary pull-right">Add</a>
                    </div>
                    <div class="panel-body tasks-list">

                        @if(count($tasks))
                            @foreach($tasks as $task)
                                <div class="row">
                                    <div class="col-xs-8 {{ $task->completed ? 'completed' : 'uncompleted' }}">
                                        <span>{{ $task->title }}</span>
                                        @foreach($task->flags as $flag)
                                            <span class="label label-info">{{ $flag->name }}</span>
                                        @endforeach
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        @if($task->completed == true)
                                            <a href="{{ route('mark-as-undone', ['$task' => $task]) }}" class="btn btn-xs btn-warning">Undone</a>
                                        @else
                                            <a href="{{ route('mark-as-done', ['$task' => $task]) }}" class="btn btn-xs btn-success">Done</a>
                                        @endif
                                        <a href="{{ route('tasks.edit', ['$task' => $task]) }}" class="btn btn-xs btn-default">Show</a>
                                        <form action="{{ route('tasks.destroy', ['$task' => $task]) }}" method="POST" class="delete-form">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else

                            <p class="text-center">No items</p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
