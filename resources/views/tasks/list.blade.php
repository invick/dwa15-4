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
                    <div class="panel-body">

                        @foreach($tasks as $task)
                            <div class="row">
                                <div class="col-xs-6">{{ $task->title }}</div>
                                <div class="col-xs-6 text-right">
                                    <button class="btn btn-sm btn-success">Done</button>
                                    <button class="btn btn-sm btn-default">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
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
