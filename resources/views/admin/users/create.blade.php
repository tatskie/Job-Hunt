{{-- \resources\views\users\create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'UGMAD | Add User')
<link href="{{asset('date/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
{!!Html::script('js/app.js')!!}
@section('content')
<div class="page-title">
              <div class="title_left">
                <h1><i class='fa fa-user-plus'></i> Add User</h1>
    
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <hr>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar Events <small>Sessions</small></h2>
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

                    {{ Form::open(array('url' => 'admin/users')) }}

                    <div class="container">
                        <div class="row">

                            <div class="col-md-5">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                                <label for="defaultForm-email">First Name</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                                <label for="defaultForm-email">Last Name</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group"> 
                            <div class="md-form">
                              <input type="text" class="form-control" id="middle_initial" name="middle_initial" required>
                              <label for="defaultForm-email">M.I.</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" placeholder="Date of birth" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" name="date_of_birth"/>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="address" name="address" required>
                                <label for="defaultForm-email">Address</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="city" name="city" required>
                                <label for="defaultForm-email">City</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="country" name="country" required>
                                <label for="defaultForm-email">Country</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="contact" name="contact" required>
                                <label for="defaultForm-email">Contact No.</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group"> 
                            <div class="md-form">
                                <select class="form-control" name="gender" id="gender" required>                             
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-9">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="text" class="form-control" id="email" name="email" required>
                                <label for="defaultForm-email">Email</label>
                            </div>
                            </div>
                            </div>
                                                
                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="password" id="password" name="password" class="form-control">
                                <label for="defaultForm-pass">Password</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group"> 
                            <div class="md-form">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                <label for="defaultForm-pa">Confirm Password</label>
                            </div>
                            </div>
                            </div>

                            <div class="col-md-5">
                            <div class="form-group"> 
                                                    
                                    @foreach ($roles as $role)
                                        {{ Form::checkbox('roles[]',  $role->id, 'checked', array('class' => 'hidden') ) }}
                                        

                                    @endforeach
                            </div>
                            </div>

                        </div>
                        </div>


                    

                    

                    {{ Form::submit('Add', array('class' => 'btn btn-success btn-block')) }}

                    {{ Form::close() }}

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