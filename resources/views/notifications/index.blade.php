@extends('layouts.app')

@section('content')
		<!--Main layout-->
        <div class="container">
            <div class="row mt-4">
            	<div class="col-lg-12 wow fadeIn" data-wow-delay="0.2s">
                <!--Main column-->
                <div class="col-lg-12">
                	<h3 style="text-align: left;">Your Notifications</h3>
                	<hr class="extra-margins">
                    <!--First row-->
                    <div class="row wow fadeIn" data-wow-delay="0.4s">
                        <div class="col-lg-12">
                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                     @forelse($notifications as $notification)
			                                     @if($notification->type == 'App\Notifications\RepliedToApplication')
				                                    <h5 class="font-bold">
				                                    	<div class="row">
				                                        	<div class="col-2">
				                                    			<a href="{{url('profile/'.$notification->data['user']['id'])}}">
				                                    			<img src="{{url('user/'.$notification->data['user']['avatar'])}}" style="height: 150px; width: 150px; border-radius: 50%;">
				                                    			{{ucwords($notification->data['user']['first_name'])}} {{ucwords($notification->data['user']['last_name'])}}</a>
				                                    		</div>

				                                    		<div class="col-10" style="text-align: left">
				                                        		<strong>
				                                     				                                        		
				                                        			<small>
				                                        			<a href="#" style="text-align: right" data-target="#SendMessage{{ $notification->id }}" data-toggle="modal"> Reply message |</a>
				                                        			{{ Carbon\Carbon::createFromTimestamp(strtotime($notification->data['message']['created_at']))->diffForHumans() }}.
				                                        		</small>
				                                        			
				                                        		</strong>
				                                        		<hr>
				                                        		<strong>Replied to your job application
				                                        		</strong>
				                                        		<small>
				                                        			{!!ucwords($notification->data['message']['message'])!!}
				                                        		</small>
				                                        		
				                                        	</div>

				                                       	</div>
				                                    </h5>
				                                    
				                                	<hr>
				                      
			                                	@endif
			                                	@if($notification->type == 'App\Notifications\RepliedToThread')
				                                    <h5 class="font-bold">
				                                    	<div class="row">
				                                        	<div class="col-2">
				                                    			<a href="{{url('profile/'.$notification->data['user']['id'])}}">
				                                    			<img src="{{url('user/'.$notification->data['user']['avatar'])}}" style="height: 150px; width: 150px; border-radius: 50%;">
				                                    			{{ucwords($notification->data['user']['first_name'])}} {{ucwords($notification->data['user']['last_name'])}}</a>
				                                    		</div>
 
				                                    		<div class="col-10" style="text-align: left">
				                                        		<strong>
				                                        			
				                                        		
				                                        			{{ucwords($notification->data['post']['title'])}} <small>
				                                        			 
				                                        			<a href="{{url('posts/'. $notification->data['post']['slug'])}}" style="text-align: right">| View post |</a>
				                                        			<a href="#" style="text-align: right" data-target="#SendMessage{{ $notification->id }}" data-toggle="modal">Send message |</a>
				                                        			{{ Carbon\Carbon::createFromTimestamp(strtotime($notification->data['post']['created_at']))->diffForHumans() }}.
				                                        		</small>
				                                        			
				                                        		</strong>
				                                        		<hr>
				                                        		<strong>Applied to your job post 
				                                        		</strong>
				                                        		<small>
				                                        			{!!ucwords($notification->data['post']['job'])!!}
				                                        		</small>
				                                        	</div>

				                                       	</div>
				                                    </h5>
				                                    
				                                	<hr>
			                                	@endif
			                                	          	
		                                	@empty
		                                	<h5 class="font-bold" style="text-align: left;">
		                                        <strong>No <small>Notifications</small></stron>
		                                    </h5>
		                                    @endforelse
		                                    {!! $notifications->links() !!}
		                                </div>
		                                
		                            </div>

                        </div>
                    </div>
                    <!--/.First row-->
                    <br>
                    					@forelse($notifications as $notification)
                  						<!-- Send Message Modal -->
						                <div id="SendMessage{{ $notification->id }}" class="modal fade" role="dialog">
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
						                            <input type="hidden" name="employee_id" value="{{ $notification->data['user']['id'] }}">
						                            <input type="hidden" name="employer_id" value="{{ auth()->user()->id }}">
						                            @endif
						                            @if(Auth::user()->verified == false)
						                            	<input type="hidden" name="employer_id" value="{{ $notification->data['user']['id'] }}">
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
						                @empty

						                @endforelse
                    				


                </div>
                <!--/.Main column-->
            </div>
            </div>
        </div>
        <!--/.Main layout-->
@endsection