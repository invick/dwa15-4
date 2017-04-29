@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Your tasks</span>
                        <button class="btn btn-sm btn-primary pull-right">Add</button>
                    </div>
                    <div class="panel-body tasks-list">

                        @foreach($tasks as $task)
                            <div class="row">
                                <div class="col-xs-8">
                                    <span class="{{ $task->completed ? 'completed' : 'uncompleted' }}">{{ $task->title }}</span>
                                </div>
                                <div class="col-xs-4 text-right">
                                    @if($task->completed == true)
                                        <a href="{{ route('mark-as-undone', ['$task' => $task]) }}" class="btn btn-xs btn-warning">Undone</a>
                                    @else
                                        <a href="{{ route('mark-as-done', ['$task' => $task]) }}" class="btn btn-xs btn-success">Done</a>
                                    @endif
                                    <button class="btn btn-xs btn-default">Edit</button>
                                    <button class="btn btn-xs btn-danger">Delete</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
