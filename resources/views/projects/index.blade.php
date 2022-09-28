@extends('master')
<style>
    .custom-table{
        font-size: 14px;
    }
</style>
@section('content')
<br />
<div class="col-lg-12">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">Projects
            <a href='{{ route('projects.create') }}' class='btn btn-sm btn-primary action-button' style="float:right;"><i class="fal fa-plus"></i>
                Add Project
            </a>
        </div>

        <div class="card-body">
            <table class="table table-responsive-sm table-striped custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class='text-right'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $value)
                        <tr>
                           <td>{{$value->name}}</td>
                           <td class='text-right'>
                                <a href='{{ route('projects.edit', ['project' => $value->id]) }}'><i  class="fa fa-edit"></i></a>&nbsp;
                                <a href='{{ route('projects.delete', ['project' => $value->id]) }}'><i class='fa fa-trash'></i></a>&nbsp;
                            </td>
                        </tr>
                       @empty
                           <tr>
                               <td colspan="2">No record found...</td>
                           </tr>
                       @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection