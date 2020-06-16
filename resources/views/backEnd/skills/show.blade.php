@extends('backLayout.app')
@section('title')
Skill
@stop

@section('content')

    <h1>Skill</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Skill</th><th>User Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $skill->id }}</td> <td> {{ $skill->skill }} </td><td> {{ $skill->user_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection