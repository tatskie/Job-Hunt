{{-- \resources\views\permissions\index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'UGMAD | Permissions')

@section('content')
            <div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-key"></i>Available Permissions
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                     <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
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
                    <h2>Permissions <small>Sessions</small></h2>
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
                                    <th>Permissions</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td> 
                                    <td>
                                    <a href="{{ URL::to('admin/permissions/'.$permission->id.'/edit') }}" class="btn btn-success btn-sm btn-round pull-left" style="margin-right: 3px;">Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm btn-round pull-left']) !!}
                                    {!! Form::close() !!}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="{{ URL::to('admin/permissions/create') }}" class="btn btn-success">Add Permission</a>

                  </div>
                </div>
              </div>
            </div>

@endsection