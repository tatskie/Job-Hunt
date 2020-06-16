@extends('backLayout.app')
@section('title')
Skill
@stop

@section('content')

    <h1>Skills <a href="{{ url('skills/create') }}" class="btn btn-primary pull-right btn-sm">Add New Skill</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblskills">
            <thead>
                <tr>
                    <th>ID</th><th>Skill</th><th>User Id</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($skills as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('skills', $item->id) }}">{{ $item->skill }}</a></td><td>{{ $item->user_id }}</td>
                    <td>
                        <a href="{{ url('skills/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['skills', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblskills').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection