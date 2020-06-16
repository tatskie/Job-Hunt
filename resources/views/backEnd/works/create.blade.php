@extends('backLayout.app')
@section('title')
Create new Work
@stop

@section('content')

    <h1>Create New Work</h1>
    <hr/>

    {!! Form::open(['url' => 'works', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('comapny') ? 'has-error' : ''}}">
                {!! Form::label('comapny', 'Comapny: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('comapny', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('comapny', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
                {!! Form::label('position', 'Position: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('position', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', 'City: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('discription') ? 'has-error' : ''}}">
                {!! Form::label('discription', 'Discription: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('discription', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('discription', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_start') ? 'has-error' : ''}}">
                {!! Form::label('date_start', 'Date Start: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date_start', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_start', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_end') ? 'has-error' : ''}}">
                {!! Form::label('date_end', 'Date End: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('date_end', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_end', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('current') ? 'has-error' : ''}}">
                {!! Form::label('current', 'Current: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('current', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('current', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('current', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                {!! Form::label('user_id', 'User Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection