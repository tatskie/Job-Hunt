{{-- \resources\views\users\create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'UGMAD | Post')

@section('content')

		<div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-pencil"></i> Total Posts 
                
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
                    <h2>Posts <small>Sessions</small></h2>
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

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Job Details</th>
                                    <th>Contact Details</th>
                                    <th>Date/Time Added</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                	<td><a href="#">{{ ucwords($post->title) }}</a></td>
                                    <td>{!! str_limit($post->job, 400) !!}</td>
                                    <td>{!! str_limit($post->contact, 200) !!}</td>
                                    <td>{{ $post->created_at->format('F d, Y h:ia') }}</td>
                                    <td>
                                    <a href="#" class="btn btn-success btn-sm btn-round pull-left" data-toggle="modal" data-target="#myModal{{$post->id}}">View Details</a>
                                    <!-- details -->
                                    <a href="#" class="btn btn-warning btn-sm btn-round pull-left" data-toggle="modal" data-target="#DeletePost{{$post->id}}">Delete Post</a>
                                    </td>
  
                                    

                                </tr>
                                <!-- Modal -->
								<div id="myModal{{$post->id}}" class="modal fade" role="dialog">
								  <div class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">{{ ucwords($post->title) }}</h4>
								      </div>
								      <div class="modal-body">
								        <h6 class="modal-title">Salary: {{ ucwords($post->salary) }}</h6>
								        <h6 class="modal-title">Company: {{ ucwords($post->company->name) }}</h6>
								        <h6 class="modal-title">City: {{ ucwords($post->company->address) }}</h6>
								        <h6 class="modal-title">Total Applicants: {{ count($post->replies) }}</h6>


								        <hr>
								        {!! $post->job !!}
								        <hr>
								        {!! $post->contact !!}
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								      </div>
								    </div>

								  </div>
								</div>
                <!-- Delete Modal -->
                <div id="DeletePost{{$post->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="card-text">Delete Post</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p class="card-text">Are you sure you want to delete {{ucwords($post->title)}} ?</p>


                        </div>
                                {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['posts', $post->id]    
                                    ]) !!}
                                <div class="modal-footer">
                                    <button class="btn btn-warning btn-sm" type="submit" id="add">Yes</button>
                                    <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">No</button>
                                </div>
                                {!!Form::close()!!}
                        </div>
                    </div>
                </div> 
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    {!!$posts->links()!!}

                  </div>
                </div>
              </div>
            </div>
@endsection