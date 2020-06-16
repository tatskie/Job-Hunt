{{-- \resources\views\users\index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'UGMAD | Admin Update Profile')
<link href="{{asset('date/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
{!!Html::script('js/app.js')!!}

@section('content')
            <div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-users"></i> {{ucwords($user->first_name)}}'s' Profile 
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Profile <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    
                  
                  
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{url('user/',$user->avatar)}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{ucwords($user->first_name)}} {{ucwords($user->last_name)}}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ucwords($user->address)}}, {{ucwords($user->city)}}, {{ucwords($user->country)}}
                        </li>

                        <li>
                          <i class="fa fa-calendar user-profile-icon"></i> {{$user->age}} yrs. old
                        </li>

                         <li>
                          <i class="fa fa-user user-profile-icon"></i> {{$user->gender}}
                        </li>
                      </ul>

                      <a href="#" class="btn btn-success" data-target="#create" data-toggle="modal"><i class="fa fa-edit m-right-xs"></i>Update Avatar</a>

                      <div id="create" class="modal fade" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Update Avatar</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-fluid" src="{{url('user/'. Auth::user()->avatar)}}" alt="Card image cap" height="200px" width="200px" style="margin-left: 180px;">
                        
                                          &nbsp;
                                          <form enctype="multipart/form-data" action="{{route('avatar')}}" method="POST">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                              <input type="file" name="avatar" style="margin-left: 180px;">

                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                        {!!Form::close()!!}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <h4>Update Your Profile</h4>
                      </div>
                     
                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['profile'],
                            'class' => 'form-horizontal'
                        ]) !!}
                        <div class="container">
                        <div class="row">

                            <div class="col-md-5">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" required>
                                <label for="defaultForm-email">First Name</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" required>
                                <label for="defaultForm-email">Last Name</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group"> 
                            <div class="md-form">
                              <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="{{$user->middle_initial}}" required>
                              <label for="defaultForm-email">M.I.</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" value="{{$user->date_of_birth}}" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" name="date_of_birth" value="{{$user->date_of_birth}}" />
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" required>
                                <label for="defaultForm-email">Address</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}" required>
                                <label for="defaultForm-email">City</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}" required>
                                <label for="defaultForm-email">Country</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="contact" name="contact" value="{{$user->contact}}" required>
                                <label for="defaultForm-email">Contact No.</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-3">
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

                            <div class="col-md-9">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                                <label for="defaultForm-email">Email</label>
                            </div>
                            </div>
                            </div>
                                                
                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="password" id="password" name="password" class="form-control" disabled="disabled">
                                <label for="defaultForm-pass">Password</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" disabled="disabled">
                                <label for="defaultForm-pa">Confirm Password</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-5">
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

                                       
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                           
                                       
                    {!!Form::close()!!}
                      
                    </div>
                  
                

                    
                  </div>
                </div>
              </div>
            </div>

<script type="text/javascript" src="{{asset('date/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('date/js/locales/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>
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