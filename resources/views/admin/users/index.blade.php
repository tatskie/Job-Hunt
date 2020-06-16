{{-- \resources\views\users\index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'UGMAD | Users')

@section('content')
            <div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-users"></i> User Administration 
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <!-- <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1> -->
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
                    <h2>Click the name of user to view the full details <small>Sessions</small></h2>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date/Time Added</th>
                                    <th>User Type</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>

                                    <td><a href="#">{{ ucwords($user->first_name) }} {{ ucwords($user->last_name) }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                    <td>
                                      @if($user->admin == 'false')
                                        @if($user->verified == false)
                                          Applicant
                                        @else
                                          Client
                                        @endif
                                      @else
                                       <strong> {{  ucwords($user->roles()->pluck('name')->implode(' ')) }}</strong>
                                      @endif

                                    </td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                    <td>
                                    <!-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm btn-round pull-left" style="margin-right: 3px;">Role</a> -->

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm btn-round pull-left']) !!}
                                    {!! Form::close() !!}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
                    <br>
                    <div style="text-align: center;">
                      {!! $users->links() !!}
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>


@endsection