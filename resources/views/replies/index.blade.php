@extends('layouts.app')

@section('content')

<div class="row">

  <div class="col-4">
    <div class="form-group">
             <!--Panel-->
            <div class="card card-body">
              
                <h4 class="card-title">
                  {{ucwords($post->title)}}
                </h4>
                  <p class="card-text">
                  {{ucwords($post->company->name)}},
                  {{ucwords($post->company->address)}}
                  </p>

                <a href="{{ url( 'posts/' . $post->slug)  }}"><i class="fa fa-eye" aria-hidden="true"> View  Post</i></a>
                  
                
              
            </div>
            <!--/.Panel-->
    </div>
  </div>

  <div class="col-8">
    <div class="form-group">
             <!--Panel-->
            
              @forelse($replies as $reply)
              <div class="form-group">
              <div class="card card-body">
                <div class="row">
                  <div class="col-2">      
                  <a href="{{ url( '/profile/' . $reply->user_id)  }}">            
                  <img src="{{url('user/'. $reply->user->avatar)}}" height="80px" width="80px">
                  </a>
                  <p class="card-text">
                  <a href="{{ url( '/profile/' . $reply->user_id)  }}">
                   {{ucfirst($reply->user->first_name)}} {{ucfirst($reply->user->last_name)}}
                  </a>
                  </p>
                  </div>
                  <div class="col-8">
                    <h4 class="card-title">
                      {{$reply->subject}}
                    </h4>
                    
                      <p class="card-text">
                        {!!$reply->cover_letter!!}
                      </p>            
                  </div>
                </div>
                
                  <div style="text-align: left;">
                  <small>
                  <!-- <a href="{{ url( '/user/' . $reply->resume)  }}" target="_blank"><i class="fa fa-download" aria-hidden="true">  Resume</i></a> -->
                  <a href="{{ url( 'resume/' . $reply->user_id)  }}"><i class="fa fa-eye" aria-hidden="true"> View  Resume</i></a> |
                  <a href="#" data-target="#SendMessage" data-toggle="modal">  <i class="fa fa-envelope" aria-hidden="true"> Send message</i></a></small>
                  <p class="card-text pull-right">
                    {{$reply->created_at->diffForHumans()}}
                  </p>
                  </div>
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
                                        <input type="hidden" name="employee_id" value="{{ $reply->user->id }}">
                                        <input type="hidden" name="employer_id" value="{{ auth()->user()->id }}">
                                        @else
                                          <input type="hidden" name="employer_id" value="{{ $reply->user->id }}">
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
              </div>
              @empty

              @endif
            
            <!--/.Panel-->
    </div>
  </div>
</div>
      
@endsection
