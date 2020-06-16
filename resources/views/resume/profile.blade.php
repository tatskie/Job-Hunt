<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Profile</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('mdb/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('mdb/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('mdb/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        main {
            padding-top: 3rem;
            padding-bottom: 2rem;
        }

        .widget-wrapper {
            padding-bottom: 2rem;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
        }

        .extra-margins {
            margin-top: 1rem;
            margin-bottom: 2.5rem;
        }

        .divider-new {
            margin-top: 0;
        }

        .navbar {
            background-color: #414a5c;
        }

        footer.page-footer {
            background-color: #414a5c;
            margin-top: 2rem;
        }

        .list-group-item.active {
            background-color: #afb3c0;
            border-color: #afb3c0;
        }

        .list-group-item:not(.active) {
            color: #222;
        }

        .list-group-item:not(.active):hover {
            color: #666;
        }

        .card {
            font-weight: 300;
        }

        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }
        .checked {
            content: '\f005';
            color: #e74c3c;
            transition: all .25s;
        }
    </style>
</head>

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
                                <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{url('resume')}}">Resume</a>
                                <a class="dropdown-item" href="{{url('employee')}}">Set Profile</a>
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

    </header>

    <main>

        <!--Main layout-->
        <div class="container">
            <div class="row mt-4">

                <!--Sidebar-->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">

                	<div class="widget-wrapper">
                        <a href="{{url('profile/'.$user->id)}}">
                            <img class="img-fluid" src="{{url('user/'. $user->avatar)}}" alt="Card image cap">
                        </a>
                    </div>

                    <div class="widget-wrapper">
                        
                        <div class="list-group">
                        	<a class="list-group-item">{{ucfirst($user->last_name)}}, {{ucfirst($user->first_name)}} {{ucfirst($user->middle_initial)}}.</a>
                            <a class="list-group-item">{{ucfirst($user->address)}}, {{ucfirst($user->city)}}, {{ucfirst($user->country)}}</a>
                            <a class="list-group-item">{{ucfirst($user->age)}} yrs. old</a>
                            <a class="list-group-item">{{$user->email}}</a>
                            <a class="list-group-item">{{$user->contact}}</a>
                            <a href="{{url('resume/'. $user->id)}}" class="list-group-item">View Resume</a>
                            
                        </div>
                    </div>

                   
                </div>
                <!--/.Sidebar-->

                <!--Main column-->
                <div class="col-lg-8">
                    @if(Auth::user()->verified == true)
                    <!--First row-->
                    <div class="row wow fadeIn" data-wow-delay="0.4s">
                        <div class="col-lg-12">
                            <h2 class="h2-responsive font-bold mb-5">Educational background</h2>

                            <!--Second row-->
		                    <div class="row">
		                    	@forelse($user->educations as $education)
		                        <!--First columnn-->
		                        <div class="col-lg-4">
		                            <!--Card-->
		                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                    <h5 class="font-bold">
		                                        <strong>{{ucwords($education->school)}}</strong>
		                                        <p class="card-text mt-4">{{ucwords($education->address)}}</p>
		                                    </h5>
		                                    <hr>
		                                    <h6>
		                                        <strong>
		                                        	@if(!empty($education->course))
		                                        		{{ucwords($education->course)}}
		                                        	@endif
		                                        </strong>
		                                    </h6>
		                                    
		                                    <div class="flex-row">
		                                    	<a class="card-link">{{ucwords($education->year_start)}}
                                                    @if(!empty($education->year_end))
                                                    |
                                                    @else

                                                    @endif
                                                    {{ucwords($education->year_end)}}
                                                </a>
		                                	</div>
		                                </div>

		                            </div>
		                            <!--/.Card-->
		                        </div>
		                        <!--First columnn-->
		                        @empty
		                        <!--First columnn-->
		                        <div class="col-lg-4">
		                            <!--Card-->
		                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                    <h5 class="font-bold">
		                                        <strong>
		                                        	
		                                        	No Educational Background
		                                        </strong>
		                                        
		                                    </h5>
		                                    
		                                    
		                                    
		                                </div>

		                            </div>
		                            <!--/.Card-->
		                        </div>
		                        <!--First columnn-->
		                        @endforelse
		                    </div>

                        </div>
                    </div>
                    <!--/.First row-->
                    <br>
                    <hr class="extra-margins">
                    <h2 class="h2-responsive font-bold mb-5">Work Experience</h2>
                    <!--Second row-->
		                    <div class="row">
		                    	@forelse($user->works as $work)
		                        <!--First columnn-->
		                        <div class="col-lg-4">
		                            <!--Card-->
		                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                    <h5 class="font-bold">
		                                        <strong>
		                                        	@if($work->current == 0)
		                                        	Former
		                                        	@endif
		                                        	{{ucwords($work->position)}}
		                                        </strong>
		                                        <p class="card-text mt-4">at {{ucwords($work->company)}}</p>
		                                        <p class="card-text mt-4">from {{ucwords($work->address)}}</p>
		                                    </h5>
		                                    <hr>
		                                    <h6>
		                                        <strong>
		                                        	@if(!empty($work->discription))
		                                        		{{ucwords($work->discription)}}
		                                        	@endif
		                                        </strong>
		                                    </h6>
		                                    
		                                    <div class="flex-row">
		                                    	<a class="card-link">{{ucwords($work->date_start)}}
                                                    @if(!empty($work->date_end))
                                                    |
                                                    @else
                                                    | Present
                                                    @endif
                                                    {{ucwords($work->date_end)}}
                                                </a>
		                                	</div>
		                                </div>

		                            </div>
		                            <!--/.Card-->
		                        </div>
		                        <!--First columnn-->
		                        @empty
		                        <!--First columnn-->
		                        <div class="col-lg-4">
		                            <!--Card-->
		                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                    <h5 class="font-bold">
		                                        <strong>
		                                        	
		                                        	No work experience!
		                                        </strong>
		                                        
		                                    </h5>
		                                    
		                                    
		                                    
		                                </div>

		                            </div>
		                            <!--/.Card-->
		                        </div>
		                        <!--First columnn-->
		                        @endforelse
		                    </div>

		            <br>
                    <hr class="extra-margins">
                    <h2 class="h2-responsive font-bold mb-5">Skills</h2>
                    <!--Second row-->
		                    <div class="row">
		                    	@forelse($user->skills as $skill)
		                        <!--First columnn-->
		                        <div class="col-lg-4">
		                            <!--Card-->
		                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                    <h5 class="font-bold">
		                                        <strong>
		                                        	
		                                        	{{ucwords($skill->skill)}}
		                                        </strong>
                                                    <br>
		                                            @if($skill->averageRating == 1)
                                                    Basic
                                                    @elseif($skill->averageRating == 2)
                                                    Basic
                                                    @elseif($skill->averageRating == 3)
                                                    Meduim
                                                    @else
                                                    Excelent
                                                    @endif
                                                    @for ($i =1; $i <= $skill->averageRating; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
		                                    </h5>
		                                    
		                                    
		                                    
		                                </div>

		                            </div>
		                            <!--/.Card-->
		                        </div>
		                        <!--First columnn-->
		                        @empty
		                        <!--First columnn-->
		                        <div class="col-lg-4">
		                            <!--Card-->
		                            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

		                                <!--Card content-->
		                                <div class="card-body">
		                                    <!--Title-->
		                                    <h5 class="font-bold">
		                                        <strong>
		                                        	
		                                        	No Skills
		                                        </strong>
                                                    
		                                        
		                                    </h5>
		                                    
		                                    
		                                    
		                                </div>

		                            </div>
		                            <!--/.Card-->
		                        </div>
		                        <!--First columnn-->
		                        @endforelse
		                    </div>

                    @else
                            <!--First row-->
                    <div class="row wow fadeIn" data-wow-delay="0.4s">
                        <div class="col-lg-12">
                            <h2 class="h2-responsive font-bold mb-5">Company</h2>

                            <!--Second row-->
                            <div class="row">
                                @forelse($user->company as $company)
                                <!--First columnn-->
                                <div class="col-lg-12">
                                    <!--Card-->
                                    <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

                                        <!--Card content-->
                                        <div class="card-body">
                                            <!--Title-->
                                            <h5 class="font-bold">
                                                <strong>{{ucwords($company->name)}}</strong>
                                                
                                            </h5>
                                            <hr>
                                            <h6>
                                                <strong>
                                                    {{ucwords($company->address)}}, {{ucwords($company->city)}}, {{ucwords($company->country)}}, {{ucwords($company->postal)}}
                                                </strong>
                                            </h6>
                                            
                                            
                                        </div>

                                    </div>
                                    <!--/.Card-->
                                </div>
                                <!--First columnn-->
                                @empty
                                <!--First columnn-->
                                <div class="col-lg-4">
                                    <!--Card-->
                                    <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

                                        <!--Card content-->
                                        <div class="card-body">
                                            <!--Title-->
                                            <h5 class="font-bold">
                                                <strong>
                                                    
                                                    No Educational Background
                                                </strong>
                                                
                                            </h5>
                                            
                                            
                                            
                                        </div>

                                    </div>
                                    <!--/.Card-->
                                </div>
                                <!--First columnn-->
                                @endforelse
                            </div>

                        </div>
                    </div>
                    
                   
                    @endif
                </div>
                <!--/.Main column-->

            </div>
        </div>
        <!--/.Main layout-->

    </main>

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
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('mdb/js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('mdb/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('mdb/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('mdb/js/mdb.min.js')}}"></script>
    
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        function markNotificationAsRead(notificationCount){
            $.get('/markAsRead');
        }
    </script>
</body>

</html>