@extends('backLayout.app')
@section('title')
Education
@stop

@section('content')

    <h1>Education</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>School</th><th>Year Start</th><th>Year End</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $education->id }}</td> <td> {{ $education->school }} </td><td> {{ $education->year_start }} </td><td> {{ $education->year_end }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection