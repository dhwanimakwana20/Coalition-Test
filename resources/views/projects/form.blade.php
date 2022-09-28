@extends('master')
@section('content')
<div class="col d-flex justify-content-center mt-4">
    <div class=" col-12">
        <form id="" action="" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card">
                <div class="card-header"><strong>Add Project</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ (old('name'))??($project->name)??'' }}" placeholder="Add Project Name">
                        @error('name')
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