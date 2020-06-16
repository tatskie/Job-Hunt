@extends('backLayout.app')
@section('title')
Company
@stop

@section('content')

    <h1>Company</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>City</th><th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $company->id }}</td> <td> {{ $company->name }} </td><td> {{ $company->city }} </td><td> {{ $company->address }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection