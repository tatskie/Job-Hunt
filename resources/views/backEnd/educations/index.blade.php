@extends('backLayout.app')
@section('title')
Education
@stop

@section('content')

    <h1>Educations <a href="{{ url('educations/create') }}" class="btn btn-primary pull-right btn-sm">Add New Education</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbleducations">
            <thead>
                <tr>
                    <th>ID</th><th>School</th><th>Year Start</th><th>Year End</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($educations as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('educations', $item->id) }}">{{ $item->school }}</a></td><td>{{ $item->year_start }}</td><td>{{ $item->year_end }}</td>
                    <td>
                        <a href="{{ url('educations/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['educations', $item->id],
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
        $('#tbleducations').DataTable({
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