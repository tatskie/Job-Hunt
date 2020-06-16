<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UGMAD</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('mdb/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('mdb/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('mdb/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<style type="text/css">
    .basic-textarea textarea {
        height: auto;
    }
    .active-pink-2 input[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #00C851;
        box-shadow: 0 1px 0 0 #00C851;
    }
</style>

<body>
        
    
    <!--Main Navigation-->
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark rgba-green-strong">
            <div class="container">
                <a class="navbar-brand" href="{{url('home')}}"><img src="{{url('user/ugmad.png')}}" height="50px" width="50px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="navbar-nav nav-flex-icons">
                        @if(Auth::user()->verified == true)
                        <li class="nav-item">
                            <a href="#" class="create-modal btn btn-light-green btn-sm" data-target="#CreatePost" data-toggle="modal">Post a Job</a>

                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{url('home')}}" class="create-modal btn btn-light-green btn-sm">Fint a Job</a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="{{ asset('user/'. Auth::user()->avatar) }}" style="width:32px; height:32px; position:absolute; top:5px; left:10px; border-radius:50%">
                                {{ucfirst(Auth::user()->first_name)}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                
                                @if(Auth::user()->verified == true)
                                <a class="dropdown-item" href="{{url('employer')}}">Set Profile</a>
                                @else
                                <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{url('resume')}}">Resume</a>
                                <a class="dropdown-item" href="{{url('employee')}}">Set Profile</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </div>
                        </li>
                        
                        
                       
                        
                        <li class="nav-item dropdown" id="markAsRead" onclick="markNotificationAsRead()">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="counter"> 
                                    
                                    {{count(auth()->user()->unreadNotifications)}}
                                </span>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                
                                <h6 style="text-align: center;">Notifications</h6>                               
                                <hr style="margin-bottom: -5px;">
                                @forelse(auth()->user()->notifications()->orderBy('updated_at', 'desc')->paginate(7) as $notification)

                                    @if($notification->type == 'App\Notifications\RepliedToApplication')
                                        <a class="dropdown-item" href="{{url('message/'. $notification->data['message']['id'])}}" style="margin-bottom: -15px;">{{ucfirst($notification->data['user']['first_name'])}} {{ucfirst($notification->data['user']['last_name'])}} has reply to your application 
                                        <br>{{ucwords($notification->data['message']['message'])}}...
                                        <small>{{$notification->created_at->diffForHumans()}}</small></a>
                                        <hr style="margin-bottom: -7px;">
                                    @endif

                                    @if($notification->type == 'App\Notifications\RepliedToThread')
                                        <a class="dropdown-item" href="{{url('posts/'. $notification->data['post']['id'] . '/reply')}}" style="margin-bottom: -15px;">{{ucfirst($notification->data['user']['first_name'])}} {{ucfirst($notification->data['user']['last_name'])}} has reply to your job post 
                                        <br>{{ucwords($notification->data['post']['title'])}}...
                                        <small>{{$notification->created_at->diffForHumans()}}</small></a>
                                        <hr style="margin-bottom: -7px;">
                                    @endif
                                    
                                @empty
                                    <a class="dropdown-item" href="#" style="text-align: center; background-color: gray; margin-bottom: -15px;">No notifications...</a>
                                @endforelse
                                @if(count(auth()->user()->notifications) == 0)
                                    
                                @else
                                    <a class="dropdown-item" href="{{url('notifications')}}" style="text-align: center; background-color: gray; margin-bottom: -10px;">See all notifications...</a>
                                @endif
                            </div>
                        </li>
                        

                        
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <!--Main Navigation-->
                    @if(Auth::user()->verified == true)
                        <div id="CreatePost" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Post a Job.</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!!Form::open(['url' => 'posts', 'method' => 'POST', 'id' => 'frm-insert', 'novalidate'])!!}
                                            <div class="container">
                                            <div class="row">
                                               <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                
                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="title" name="title" class="form-control" required>
                                                    <label for="defaultForm-email">Title</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <select class="form-control" name="category_id" id="category_id" required>
                                                    @foreach($categories = App\Category::all() as $category)
                                                    <option value="{{$category->id}}">{{ucwords($category->job)}}</option>
                                                    
                                                    @endforeach
                                                  </select>
                                                </div>
                                                </div>
                                                </div>

                                                

                                                <div class="col-4">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="number" id="salary" name="salary" class="form-control" required>
                                                    <label for="defaultForm-email">State the salary</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="city" name="city" class="form-control" required>
                                                    <label for="defaultForm-email">State your city</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="form-group basic-textarea">
                                                    <label for="exampleFormControlTextarea1">Contact Details</label>
                                                    <textarea class="form-control" id="contact" name="contact" rows="3" required></textarea>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="form-group basic-textarea">
                                                    <label for="exampleFormControlTextarea1">Job Details</label>
                                                    <textarea class="form-control" id="job" name="job" rows="3" required></textarea>
                                                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                                                  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                                                  <script>
                                                   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
                                                  </script>

                                                  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                                                  <script>
                                                    var editor_config = {
                                                      path_absolute : "",
                                                      selector: "textarea[id=job]",
                                                      plugins: [
                                                        "link image"
                                                      ],
                                                      relative_urls: false,
                                                      height: 129,
                                                      file_browser_callback : function(field_name, url, type, win) {
                                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                                                        var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
                                                        if (type == 'image') {
                                                          cmsURL = cmsURL + "&type=Images";
                                                        } else {
                                                          cmsURL = cmsURL + "&type=Files";
                                                        }

                                                        tinyMCE.activeEditor.windowManager.open({
                                                          file : cmsURL,
                                                          title : 'Filemanager',
                                                          width : x * 0.8,
                                                          height : y * 0.8,
                                                          resizable : "yes",
                                                          close_previous : "no"
                                                        });
                                                      }
                                                    };

                                                    tinymce.init(editor_config);
                                                  </script>
                                                </div>

                                                </div>
                                                </div>

                                            </div>
                                            </div>
                                            
                                            <!-- Form login -->
                                            

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Add Post</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal"><i class="fa fa-remove" aria-hidden="true"></i> Close</button>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endif

    <!--Main Layout-->
    <main class="text-center py-5 mt-3">
        @if(Session::has('flash_message'))
        <div class="d-inline-flex p-2">

            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
              <strong>{!! session('flash_message') !!}</strong>
            </div>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="d-inline-flex p-2"> 
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                @foreach ($errors->all() as $error)
                    <span><b> {{ $error }} </b></span>
                    <br>
                @endforeach
            </div>
        </div>
        @endif

        @if (empty(auth()->user()->email))
        <div class="d-inline-flex p-2"> 
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                
                    <span><b> Please update your profile. 
                        @if(auth()->user()->verified == true)
                            <a href="{{url('employer')}}">Click here!</a>
                        @else
                            <a href="{{url('employee')}}">Click here!</a>
                        @endif
                     </b></span>
                    <br>
               
            </div>
        </div>
        @endif
        <div class="container">


            <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                        {!! Form::open(array('route' => 'search', 'class'=>'form navbar-form navbar-right searchform')) !!}
                            <div class="md-form input-group">
                                <input type="search" name="search" id="searchItem" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="my-0 btn btn-default" type="submit">Go!</button>
                                </span>
                            </div> 
                         {!! Form::close() !!}
                                                  
                    </div>
                    <!--
                    <div class="col-4">
                      <select class="form-control" name="category_id" id="category_id" required>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ucwords($category->job)}}</option>
                                                                
                        @endforeach
                      </select>
                    </div>
                    -->
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <!--
                  <img src="{{url('user/ugmad.png')}}" style="width: 100px; height: 100px; margin-top: -35px;"> 
                  -->
                </div>
              </div>
              
            </div>
               
            <div class="card card-body">
                
            <table class="table">
              <thead>
                <tr>
                  <th>Position</th>
                  <th>Location</th>
                  <th>Company</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody id="append">
                @foreach($posts as $post)
                <tr>
                  <th class="row"><a href="{{url('posts/'. $post->slug)}}"> {{ucwords($post->title)}}</a></th>
                  <td>{{ucwords($post->company->address)}}</td>
                  <td>{{ucwords($post->company->name)}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>

                </tr>
                <!--
                {!! $post->job !!}
                -->
                @endforeach
                {{$posts->links()}}
              </tbody>
            </table>
                                                
               
            </div>


        </div>

    </main>
    <!--Main Layout-->

    <!--Footer-->
    <footer class="page-footer blue-grey lighten-2 center-on-small-only">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">

                <!--First column-->
                <div class="col-md-6">
                    <h5 class="title">Footer Content</h5>
                    <p>Here you can use rows and columns here to organize your footer content.</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-6">
                    <h5 class="title">Links</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Second column-->
            </div>
        </div>
        <!--/.Footer Links-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2018 Copyright: <a href="#"> http://ugmad.com </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
    </div>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('mdb/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('mdb/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('mdb/js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<!--     <script type="text/javascript" src="{{asset('js/main.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
    
      $( function() {
        
        $("#searchItem").autocomplete({
          source: '{{url("search")}}'
        });
      });

        function markNotificationAsRead(notificationCount){
            $.get('/markAsRead');
        }

      // $('#searchItem').on('keyup', function(){
      //     $value = $(this).val();

      //     $.ajax({
      //       type : 'GET',
      //       url : '{{URL::to('searchJob')}}',
      //       data : {'search' : $value},
      //       success: function(data){
      //         $('#append').html(data);
      //       },
      //     });
      // });
    </script>
</body>

</html>

