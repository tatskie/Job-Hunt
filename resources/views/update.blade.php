@extends('layouts.app')

@section('content')

        <link href="{{asset('date/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
{!!Html::script('js/app.js')!!}
<h1>Create your Profile for Consideration</h1>
<div class="row">
    
    <div class="col-4">
        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Update Profile</h4>
                <p class="card-text">The information you include in your profile will largely determine whether you are approved to join our marketplace.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('employee')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Skills</h4>
                <p class="card-text">Soft skills include communication, critical thinking, and conflict resolution, among others. Hard skills are quantifiable and teachable; they include specific knowledge and abilities required for a job.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('skills')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Educational Background</h4>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('educations')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Work Experience</h4>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('works')}}">Add Info</a>
                </div>
            <!--/.Panel-->
            </div>
        </div>
    </div>

    <div class="col-8">
        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">

                <h4 class="card-title">Job Category</h4>

                <div class="row">
                
                    <div class="col-12">
                        
                        @forelse($user->jobs as $job)
                        <!--Panel-->
                        <div class="col-row">

                        <div class="col-12">
                        <div class="card card-body">
                            <h4 class="card-title">{{ucwords($job->category->job)}}</h4>
                            <p class="card-text">{{ucwords($job->discription)}}
                            </p>
                            <div class="flex-row">
                                <a class="card-link" data-target="#modalEdit{{$job->id}}" data-toggle="modal"><i class='fa fa-pencil' aria-hidden='true'></i></a>

                                <a class="card-link" data-target="#modalDelete{{$job->id}}" data-toggle="modal"><i class='fa fa-remove' aria-hidden='true'></i></a>

                                <!-- Delete Modal -->
                                <div id="modalEdit{{$job->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog" role="document">

                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="card-text">Delete Job Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($job, [
                                                'method' => 'PATCH',
                                                'url' => ['jobs', $job->id],
                                                'class' => 'form-horizontal'
                                            ]) !!}
                                                <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <select class="form-control" name="category_id" id="category_id" required>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{ucwords($category->job)}}</option>
                                                    
                                                    @endforeach
                                                  </select>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="discription" name="discription" value="{{$job->discription}}" required>
                                                    <label for="defaultForm-email">Job Description</label>
                                                </div>
                                                </div>
                                                </div>

                                        </div>
                                            
                                            <div class="modal-footer">
                                                <button class="btn btn-warning btn-sm" type="submit">Yes</button>
                                                <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">No</button>
                                            </div>
                                            {!!Form::close()!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div id="modalDelete{{$job->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog" role="document">

                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="card-text">Delete Job Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="card-text">Are you sure you want to delete {{ucwords($job->category->job)}} ?</p>


                                        </div>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['jobs', $job->id]    
                                            ]) !!}
                                            <div class="modal-footer">
                                                <button class="btn btn-warning btn-sm" type="submit">Yes</button>
                                                <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">No</button>
                                            </div>
                                            {!!Form::close()!!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                        </div>
                        @empty
                        <!--/.Panel-->
                        <p class="card-text">Please Select for your Job Category!</p>
                        @endforelse
                        <button type="button" class="create-modal btn btn-primary pull-right btn-sm" data-target="#category" data-toggle="modal">Update Job Category</button>

                          <div id="category" class="modal fade" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Update Job Category</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!!Form::open(['url' => 'jobs', 'method' => 'POST', 'id' => 'frm-insert'])!!}
                                            <div class="container">
                                            <div class="row">

                                                

                                                <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <select class="form-control" name="category_id" id="category_id" required>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{ucwords($category->job)}}</option>
                                                    
                                                    @endforeach
                                                  </select>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="discription" name="discription" required>
                                                    <label for="defaultForm-email">Job Description</label>
                                                </div>
                                                </div>
                                                </div>

                                                

                                            </div>
                                            </div>

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
                </div>

            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Tell us more about you</h4>
                <div class="row">
        
                    <div class="col-4">
                        <a href="{{url('profile')}}">
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
                                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
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
