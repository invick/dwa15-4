@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Create new task</span>
                        <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-default pull-right">Back</a>
                    </div>
                    <div class="panel-body">

                        <form role="form" method="POST" action="{{ route('tasks.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="control-label">Title *</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" minlength="2" maxlength="30" placeholder="Enter title" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="10" maxlength="10000" placeholder="Enter description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('flags') ? ' has-error' : '' }}">
                                <label for="flags" class="control-label">Flags</label>
                                <select name="flags[]" id="flags" class="form-control select2" multiple="multiple" data-placeholder="Select flags">
                                    @foreach($flags as $flag)
                                        <option value="{{ $flag->id }}" {{ in_array($flag->id, old('flags', [])) ? 'selected' : '' }}>{{ $flag->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('flags'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('flags') }}</strong>
                                </span>
                                @endif
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary pull-right">Create</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
