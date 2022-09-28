@extends('master')
<style>
    .custom-table {
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
            <div class="card-header">Tasks
                <a href='{{ route('tasks.create') }}' class='btn btn-sm btn-primary action-button' style="float:right;"><i
                        class="fal fa-plus"></i>
                    Add Task
                </a>
                <div class="dropdown open">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Projects
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item" href="0">All</a>
                        @foreach ($projects as $value)
                            <a class="dropdown-item" href="{{ route('tasks',['id' => $value->id]) }}">{{$value->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-striped custom-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Priority</th>
                            <th>Project Name</th>
                            <th class='text-right'>Action</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        @forelse ($tasks as $value)
                            <tr data-id="{{ $value->id }}" class="row1">
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->priority }}</td>
                                <td>{{ $value->project->name }}</td>
                                <td class='text-right'>
                                    <a href='{{ route('tasks.edit', ['task' => $value->id]) }}'><i
                                            class="fa fa-edit"></i></a>&nbsp;
                                    <a href='{{ route('tasks.delete', ['task' => $value->id]) }}'><i
                                            class='fa fa-trash'></i></a>&nbsp;
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $("#sortable").sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function(e) {
                updatePostOrder();
            }
        });

        function updatePostOrder() {
            var order = [];
            var token = $('meta[name="csrf-token"]').attr('content');
            $('tr.row1').each(function(index, element) {
                order.push({
                    id: $(this).attr('data-id'),
                    priority: (index + 1)
                });
            });
            $.ajax({
                type: "POST",
                url: "{{ route('task.sequence') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    priority: order,
                },
                success: function(data) {
                    location.reload()
                },
                error: function(data) {}
            });
        }
    </script>
@endsection
