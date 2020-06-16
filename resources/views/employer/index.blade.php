@extends('layouts.app')

@section('content')

        <link href="{{asset('date/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
{!!Html::script('js/app.js')!!}
<h1>Create your Profile & Company for Consideration</h1>
<div class="row">
    
    <div class="col-4">
        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Update Profile</h4>
                <p class="card-text">The information you include in your profile will largely determine whether you are approved to join our marketplace.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('employer')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Company</h4>
                <p class="card-text">Soft skills include communication, critical thinking, and conflict resolution, among others. Hard skills are quantifiable and teachable; they include specific knowledge and abilities required for a job.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('company')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>
    </div>

    <div class="col-8">
        

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Tell us more about you</h4>
                <div class="row">
        
                    <div class="col-4">
                        <a href="{{url('employer')}}">
                        <img class="img-fluid" src="{{url('user/'. Auth::user()->avatar)}}" alt="Card image cap">
                        </a>
                        
                        &nbsp;
                        <form enctype="multipart/form-data" action="{{route('avatar')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="file" name="avatar">
                                                        
                            <button type="submit" class="btn btn-indigo">Upload Photo</button>
                        </form>
                    </div>
                    <div class="col-8">
                        <ul class="list-group">
                          <li class="list-group-item">{{ucfirst(Auth::user()->last_name)}}, {{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->middle_initial)}}.</li>
                          <li class="list-group-item">{{ucfirst(Auth::user()->address)}}, {{ucfirst(Auth::user()->city)}}, {{ucfirst(Auth::user()->country)}}</li>
                          <li class="list-group-item">{{ucfirst(Auth::user()->age)}} yrs. old</li>
                          <li class="list-group-item">{{Auth::user()->email}}</li>
                          <li class="list-group-item">{{Auth::user()->contact}}</li>
                        </ul>               
                    </div>

                </div>
                <br>
                
                <a href="#" class="btn btn-default btn-lg btn-block" data-target="#create" data-toggle="modal">Update Profile</a>

                <div id="create" class="modal fade" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Update Profile</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($user, [
                                                'method' => 'PATCH',
                                                'url' => ['profile'],
                                                'class' => 'form-horizontal'
                                            ]) !!}
                                            <div class="container">
                                            <div class="row">

                                                <div class="col-5">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" required>
                                                    <label for="defaultForm-email">First Name</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" required>
                                                    <label for="defaultForm-email">Last Name</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-3">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="{{$user->middle_initial}}" required>
                                                    <label for="defaultForm-email">M.I.</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                    <input class="form-control" size="16" type="text" value="{{$user->date_of_birth}}" readonly>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                                    </div>
                                                    <input type="hidden" id="dtp_input1" name="date_of_birth" value="{{$user->date_of_birth}}" />
                                                <!--
                                                    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{$user->date_of_birth}}" required>
                                                    <label for="defaultForm-email">Date Of Birth</label>
                                                -->
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" required>
                                                    <label for="defaultForm-email">Address</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}" required>
                                                    <label for="defaultForm-email">City</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}" required>
                                                    <label for="defaultForm-email">Country</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="contact" name="contact" value="{{$user->contact}}" required>
                                                    <label for="defaultForm-email">Contact No.</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-3">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <select class="form-control" name="gender" id="gender" value="{{$user->gender}}" required>
                                                    @if($user->gender == 'Male')
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    @else

                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    @endif
                                                  </select>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-9">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                                                    <label for="defaultForm-email">Email</label>
                                                </div>
                                                </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="password" id="password" name="password" class="form-control" disabled="disabled">
                                                    <label for="defaultForm-pass">Password</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" disabled="disabled">
                                                    <label for="defaultForm-pass">Confirm Password</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-5">
                                                <div class="form-group"> 
                                                    
                                                    <input type="checkbox" id="pass" name="pass" value="1">
                                                    
                                                    <label for="checkbox100">Change Password</label>
                                                </div>
                                                </div>

                                                <script type="text/javascript">
                                                    $('#pass').click(function(){
                                                        if ($('#pass').is(':checked')) {

                                                                $('#password_confirmation').attr({'required': 'required'});
                                                                $('#password_confirmation').removeAttr('disabled');
                                                                $('#password').attr({'required': 'required'});
                                                                $('#password').removeAttr('disabled');
                                                                

                                                            } else {
                                                                
                                                                $('#password_confirmation').attr({'disabled': 'disabled'});
                                                                $('#password').attr({'disabled': 'disabled'});
                                                               
                                                            }
                                                        
                                                    });
                                                </script>

                                            </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="submit" id="add">Submit</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                        {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
            </div>
            <!--/.Panel-->
        </div>

    </div>
    
</div>
<script type="text/javascript" src="date/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="date/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
@endsection
