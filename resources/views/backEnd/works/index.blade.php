@extends('backLayout.app')
@section('title')
Work
@stop

@section('content')

    <h1>Works <a href="{{ url('works/create') }}" class="btn btn-primary pull-right btn-sm">Add New Work</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblworks">
            <thead>
                <tr>
                    <th>ID</th><th>Comapny</th><th>Position</th><th>City</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($works as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('works', $item->id) }}">{{ $item->comapny }}</a></td><td>{{ $item->position }}</td><td>{{ $item->city }}</td>
                    <td>
                        <a href="{{ url('works/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['works', $item->id],
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
        $('#tblworks').DataTable({
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