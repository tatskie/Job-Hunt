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
                <h4 class="card-title">Company</h4>
                <p class="card-text">Soft skills include communication, critical thinking, and conflict resolution, among others. Hard skills are quantifiable and teachable; they include specific knowledge and abilities required for a job.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('company')}}">Add Info</a>
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
                    <a class="btn btn-light-green" href="{{url('employer')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        
    </div>

    <div class="col-8">

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Tell us more about your Company.</h4>
                <div class="row">
                   
                            
                        @forelse($company as $company)
                         <div class="col-8">
                            <div class="list-group">
                              <a href="#" class="list-group-item active">
                                {{ucwords($company->name)}}
                              </a>
                              <a href="#" class="list-group-item">
                                {{ucwords($company->address)}}
                              </a>
                              <a href="#" class="list-group-item">
                                {{ucwords($company->city)}}, {{ucwords($company->country)}}
                              </a>
                              <a href="#" class="list-group-item">
                                {{ucwords($company->postal)}}
                              </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <a href="#" class="create-modal btn btn-warning pull-right btn-sm" data-target="#modalEdit" data-toggle="modal">Edit Company</a>
                            <!-- Edit -->
                        <div id="modalEdit" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Add Company</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($company, [
                                                'method' => 'PATCH',
                                                'url' => ['company', $company->id],
                                                'class' => 'form-horizontal'
                                            ]) !!}
                                            <div class="container">
                                            <div class="row">
                                               <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                
                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="name" name="name" class="form-control" value="{{$company->name}}" required>
                                                    <label for="defaultForm-email">Company Name</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="city" name="city" value="{{$company->city}}" class="form-control" required>
                                                    <label for="defaultForm-email">City</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-5">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="country" name="country" value="{{$company->country}}" class="form-control" required>
                                                    <label for="defaultForm-email">Country</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-3">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="postal" name="postal" class="form-control" value="{{$company->postal}}" required>
                                                    <label for="defaultForm-email">Postal Code</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="address" name="address" value="{{$company->address}}" class="form-control" required>
                                                    <label for="defaultForm-email">Address</label>
                                                </div>

                                                </div>
                                                </div>


                                            </div>
                                            </div>
                                            
                                            <!-- Form login -->
                                            

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="submit" ><i class="fa fa-plus" aria-hidden="true"></i> Save Company</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal"><i class="fa fa-remove" aria-hidden="true"></i> Close</button>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        @empty
                        <div class="col-8">
                            <div class="list-group">
                              <a href="#" class="list-group-item active">                               
                                Please add your company!
                              </a>
                            </div>
                        </div>

                        <div class="col-4">
                        
                         <a href="#" class="create-modal btn btn-primary pull-right btn-sm" data-target="#modalCreate" data-toggle="modal">Add Company</a>
                            <!--Create Modal -->
                         <div id="modalCreate" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Add Company</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!!Form::open(['url' => 'company', 'method' => 'POST', 'id' => 'frm-insert'])!!}
                                            <div class="container">
                                            <div class="row">
                                               <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                
                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="name" name="name" class="form-control" required>
                                                    <label for="defaultForm-email">Company Name</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="city" name="city" class="form-control" required>
                                                    <label for="defaultForm-email">City</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-5">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="country" name="country" class="form-control" required>
                                                    <label for="defaultForm-email">Country</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-3">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="postal" name="postal" class="form-control" required>
                                                    <label for="defaultForm-email">Postal Code</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="address" name="address" class="form-control" required>
                                                    <label for="defaultForm-email">Address</label>
                                                </div>

                                                </div>
                                                </div>


                                            </div>
                                            </div>
                                            
                                            <!-- Form login -->
                                            

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Save Company</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal"><i class="fa fa-remove" aria-hidden="true"></i> Close</button>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                        @endforelse
                            
                    
                    
                       
                           

                        


                        
                
                
                

                
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
