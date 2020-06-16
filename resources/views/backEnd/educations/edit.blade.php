@extends('backLayout.app')
@section('title')
Edit Education
@stop

@section('content')

    <h1>Edit Education</h1>
    <hr/>

    {!! Form::model($education, [
        'method' => 'PATCH',
        'url' => ['educations', $education->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('school') ? 'has-error' : ''}}">
                {!! Form::label('school', 'School: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('school', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('school', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('year_start') ? 'has-error' : ''}}">
                {!! Form::label('year_start', 'Year Start: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('year_start', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('year_start', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('year_end') ? 'has-error' : ''}}">
                {!! Form::label('year_end', 'Year End: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('year_end', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('year_end', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('graduated') ? 'has-error' : ''}}">
                {!! Form::label('graduated', 'Graduated: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('graduated', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('graduated', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('graduated', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('discription') ? 'has-error' : ''}}">
                {!! Form::label('discription', 'Discription: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('discription', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('discription', '<p class="help-block">:message</p>') !!}
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
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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