@extends('admin.layouts.app')

@section('title', 'UGMAD | Job Category')

@section('content')
            <div class="page-title">
              <div class="title_left">
                <h3>Category</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                    <span class="input-group-btn">
                      <a href="{{url('admin/category/create')}}" class="btn btn-default" type="button">Add Category</a>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Page {{ $categories->currentPage() }} of {{ $categories->lastPage() }} <small>Sessions</small></h2>
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
                                    <th>Category Name</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                <td>
                                    <a href="{{ route('category.show', $category->id ) }}"><b>{{ $category->job }}</b><br>
                                        
                                    </a>
                                </td>
                                </tr>

                                    
                                
                                @endforeach
                            </tbody>

                        </table>
                    </div>                        
                            
                       
                    
                    <div class="text-center">
                        {!! $categories->links() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
@endsection