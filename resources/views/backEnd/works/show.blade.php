@extends('backLayout.app')
@section('title')
Work
@stop

@section('content')

    <h1>Work</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Comapny</th><th>Position</th><th>City</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $work->id }}</td> <td> {{ $work->comapny }} </td><td> {{ $work->position }} </td><td> {{ $work->city }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection