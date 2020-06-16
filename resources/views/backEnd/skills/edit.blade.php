@extends('backLayout.app')
@section('title')
Edit Skill
@stop

@section('content')

    <h1>Edit Skill</h1>
    <hr/>

    {!! Form::model($skill, [
        'method' => 'PATCH',
        'url' => ['skills', $skill->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('skill') ? 'has-error' : ''}}">
                {!! Form::label('skill', 'Skill: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('skill', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('skill', '<p class="help-block">:message</p>') !!}
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