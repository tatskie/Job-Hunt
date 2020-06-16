@extends('layouts.app')

@section('content')
		<!--Main layout-->
        <div class="container">
            <div class="row mt-4">
            	<div class="col-lg-12 wow fadeIn" data-wow-delay="0.2s">
                <!--Main column-->
                <div class="col-lg-12">
                	<h3 style="text-align: left;">
                		@if(Auth::user()->verified == true)
                		<a href="{{ url( '/profile/' . $message->employee_id)  }}"> 
                		{{ucwords($message->employee->first_name)}} {{ucwords($message->employee->last_name)}}</a>  has message you...
                		@endif

                		@if(Auth::user()->verified == false)
                		
                		{{ucwords($message->employer->first_name)}} {{ucwords($message->employer->last_name)}} has message you...
                		@endif
                	</h3>
                	<hr class="extra-margins">
                    <!--First row-->
                    <div class="row wow fadeIn" data-wow-delay="0.4s">
                        <div class="col-lg-12">
                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                     
		                                	
		                                	<h5 class="font-bold" style="text-align: left;">
		                                        <strong>{!!ucwords($message->message)!!}</strong>
		                                    </h5>
		                                    <hr>
		                                    {{$message->created_at->diffForHumans()}} <small>
				                                        			 
				                            <a href="#" style="text-align: right" data-target="#SendMessage" data-toggle="modal">| Send Reply</a>
		                                </div>
		                                
		                            </div>

                        </div>
                    </div>
                    <!--/.First row-->
                    <br>
                    					
                  						<!-- Send Message Modal -->
						                <div id="SendMessage" class="modal fade" role="dialog">
						                    <div class="modal-dialog" role="document">

						                        <div class="modal-content">
						                            <div class="modal-header">
						                            <h4 class="card-text">Send Message</h4>
						                            <button type="button" class="close" data-dismiss="modal">&times;</button>
						                        </div>
						                        <div class="modal-body">
						                          <form enctype="multipart/form-data" action="{{url('message')}}" method="POST" novalidate>
						                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
						                            @if(Auth::user()->verified == true)
						                            <input type="hidden" name="employee_id" value="{{$message->employee->id}}">
						                            <input type="hidden" name="employer_id" value="{{ auth()->user()->id }}">
						                            @endif
						                            @if(Auth::user()->verified == false)
						                            	<input type="hidden" name="employer_id" value="{{$message->employer->id}}">
						                            	<input type="hidden" name="employee_id" value="{{ auth()->user()->id }}">
						                            @endif
						                            <div class="form-group basic-textarea">
						                                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
						                            </div>
						                        </div>   
						                                <div class="modal-footer">
						                                    <button class="btn btn-warning btn-sm" type="submit" id="add">Send</button>
						                                    <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">Close</button>
						                                </div>
						                               </form>
						                        </div>
						                    </div>
						                </div>
						                
                    				


                </div>
                <!--/.Main column-->
            </div>
            </div>
        </div>
        <!--/.Main layout-->
@endsection