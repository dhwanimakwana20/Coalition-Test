@extends('master')
@section('content')
<div class="col d-flex justify-content-center mt-4">
    <div class=" col-12">
        <form id="" action="" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card">
                <div class="card-header"><strong>Add Task</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ (old('name'))??($task->name)??'' }}" placeholder="Add Task Name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Priority</label>
                        <input type="text" name="priority" id="priority" class="form-control" value="{{ (old('priority'))??($task->priority)??'' }}" placeholder="Add Priority(number only)">
                        @error('priority')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project">Select Project</label>
                        <select name="project" id="project">
                            @foreach ($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                        @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit" id="submitBTN">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection