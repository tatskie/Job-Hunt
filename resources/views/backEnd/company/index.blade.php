@extends('backLayout.app')
@section('title')
Company
@stop

@section('content')

    <h1>Company <a href="{{ url('company/create') }}" class="btn btn-primary pull-right btn-sm">Add New Company</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblcompany">
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>City</th><th>Address</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($company as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('company', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->city }}</td><td>{{ $item->address }}</td>
                    <td>
                        <a href="{{ url('company/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['company', $item->id],
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
        $('#tblcompany').DataTable({
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