@extends('layouts.app')

@section('content')
{!!Html::script('js/app.js')!!}
<h1>Create your Profile for Consideration</h1>
<div class="row">
    
    <div class="col-4">
        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Work Experience</h4>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('works')}}">Add Info</a>
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
                <h4 class="card-title">Update Profile</h4>
                <p class="card-text">The information you include in your profile will largely determine whether you are approved to join our marketplace.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('home')}}">Add Info</a>
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
    </div>

    <div class="col-8">
        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <div class="row">
        
                    <div class="col-12">
                        <div class="table table-responsive">
                        <a href="#" class="create-modal btn btn-primary pull-right btn-sm" data-target="#create" data-toggle="modal">Add Work Experience</a>
         <br>
                        <div class="container">
                            <div class="row">  
                                

                                    @foreach($works as $work)   
                                    <div class="col-12">
                                    <div class="form-group">          
                                        <!--Card-->
                                        <div class="card">

                                            <!--Card content-->
                                            <div class="card-body">
                                                <!--Title-->
                                                <h4 class="card-title">
                                                    @if($work->current == 0)
                                                    Former
                                                    @endif
                                                    {{ucwords($work->position)}} at {{ucwords($work->company)}}
                                                </h4>
                                                <!--Text-->
                                                <p class="card-text">From {{ucwords($work->address)}}</p>
                                                <p class="card-text">{{ucwords($work->discription)}}</p>
                                                <a class="card-link">{{ucwords($work->date_start)}}
                                                    @if($work->current == 0)
                                                    | {{ucwords($work->date_end)}}
                                                    @else
                                                    | present
                                                    @endif
                                                    </a>
                                                <div class="flex-row">

                                                    <a class="card-link" data-target="#modalEdit{{$work->id}}" data-toggle="modal"><i class='fa fa-pencil' aria-hidden='true'></i></a>

                                                    <a class="card-link" data-target="#modalDelete{{$work->id}}" data-toggle="modal"><i class='fa fa-remove' aria-hidden='true'></i></a>


                                                    <!-- Edit Modal -->
                                                    <div id="modalEdit{{$work->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog" role="document">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h4 class="card-text">Update Work Experience</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! Form::model($work, [
                                                                    'method' => 'PATCH',
                                                                    'url' => ['works', $work->id],
                                                                    'class' => 'form-horizontal'
                                                                ]) !!}
                                                                <div class="container">
                                                                <div class="row">

                                                                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                                    <div class="col-6">
                                                                    <div class="form-group"> 
                                                                    <div class="md-form">
                                                                        <input type="text" class="form-control" id="company" name="company" value="{{$work->company}}" required>
                                                                        <label for="defaultForm-email">Company</label>
                                                                    </div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                    <div class="form-group"> 
                                                                    <div class="md-form">
                                                                        <input type="text" class="form-control" id="position" name="position" value="{{$work->position}}" required>
                                                                        <label for="defaultForm-email">Position</label>
                                                                    </div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                    <div class="form-group"> 
                                                                    <div class="md-form">
                                                                        <input type="text" class="form-control" id="address" name="address" value="{{$work->address}}" required>
                                                                        <label for="defaultForm-email">Address</label>
                                                                    </div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                    <div class="form-group"> 
                                                                    <div class="md-form">
                                                                        <input type="text" class="form-control" id="discription" value="{{$work->discription}}" name="discription" required>
                                                                        <label for="defaultForm-email">Description</label>
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-6">
                                                                    <div class="form-group"> 
                                                                    <div class="md-form">
                                                                        <input type="text" id="date_start" name="date_start" value="{{$work->date_start}}" class="form-control" required>
                                                                        <label for="defaultForm-pass">Year Start</label>
                                                                    </div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                    <div class="form-group"> 
                                                                    <div class="md-form">
                                                                        <input type="text" id="date_end{{$work->id}}" name="date_end" value="{{$work->date_end}}" class="form-control" disabled="disabled">
                                                                        <label for="defaultForm-pass">Year End</label>
                                                                    </div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="col-5">
                                                                    <div class="form-group"> 
                                                                        
                                                                        
                                                                        <input type="hidden" value="0" name="current">    
                                                                        <input {{isset($work['current'])&&$work['current']=='1' ? 'checked' : ''}} value="1" type="checkbox" id="current{{$work->id}}" name="current">
                                                                        <label for="checkbox100">I currently work here</label>
                                                                    </div>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $('#current{{$work->id}}').click(function(){
                                                                            if ($('#current{{$work->id}}').is(':checked')) {

                                                                                    $('#date_end{{$work->id}}').attr({'disabled': 'disabled'});
                                                                                    $('#date_end{{$work->id}}').val('');

                                                                                } else {
                                                                                    $('#date_end{{$work->id}}').attr({'required': 'required'});
                                                                                    $('#date_end{{$work->id}}').removeAttr('disabled');
                                                                                }
                                                                            
                                                                        });
                                                                    </script>

                                                                </div>
                                                                </div>
                                                            </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-primary btn-sm" type="submit" id="add">Update</button>
                                                                        <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">No</button>
                                                                    </div>
                                                                    {!!Form::close()!!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Modal -->
                                                    <div id="modalDelete{{$work->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog" role="document">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h4 class="card-text">Delete Work Experience</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="card-text">Are you sure you want to delete {{ucwords($work->position)}} at {{ucwords($work->company)}} ?</p>


                                                            </div>
                                                                    {!! Form::open([
                                                                            'method'=>'DELETE',
                                                                            'url' => ['works', $work->id]    
                                                                        ]) !!}
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-warning btn-sm" type="submit" id="add">Yes</button>
                                                                        <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">No</button>
                                                                    </div>
                                                                    {!!Form::close()!!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!--/.Card-->
                                        </div>
                                </div>
                                    @endforeach
                                    
                            </div>
                        </div>

                        </div>
                        <div id="create" class="modal fade" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Add Work Experience</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!!Form::open(['url' => 'works', 'method' => 'POST', 'id' => 'frm-insert'])!!}
                                            <div class="container">
                                            <div class="row">

                                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="company" name="company" required>
                                                    <label for="defaultForm-email">Company</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="position" name="position" required>
                                                    <label for="defaultForm-email">Position</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="address" name="address" required>
                                                    <label for="defaultForm-email">Address</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="discription" name="discription" required>
                                                    <label for="defaultForm-email">Description</label>
                                                </div>
                                                </div>
                                                </div>
                                                
                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" id="date_start" name="date_start" class="form-control" required>
                                                    <label for="defaultForm-pass">Year Start</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" id="date_end" name="date_end" class="form-control" disabled="disabled">
                                                    <label for="defaultForm-pass">Year End</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-5">
                                                <div class="form-group"> 
                                                    
                                                    <input type="checkbox" id="current" name="current" value="1" checked="true">
                                                    
                                                    <label for="checkbox100">I currently work here</label>
                                                </div>
                                                </div>

                                                <script type="text/javascript">
                                                    $('#current').click(function(){
                                                        if ($('#current').is(':checked')) {

                                                                $('#date_end').attr({'disabled': 'disabled'});
                                                                $('#date_end').val('');

                                                            } else {
                                                                $('#date_end').attr({'required': 'required'});
                                                                $('#date_end').removeAttr('disabled');
                                                               
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
                </div>

            </div>
            <!--/.Panel-->
        </div>

    </div>
    
</div>
@endsection
