<!DOCTYPE html>
<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>UGMAD</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{asset('form/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('form/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('form/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{asset('form/css/style.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="form/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('form/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('form/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('form/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('form/ico/apple-touch-icon-57-precomposed.png')}}">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container" style="margin-top: -50px;">
                    
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Connect with:</h3>
                                    <div class="social-login-buttons">
                                        <a class="btn btn-sm btn-primary" href="{{ url('/auth/facebook') }}">
                                            <i class="fa fa-facebook"></i> Facebook
                                        </a>
                                        <a class="btn btn-sm btn-info" href="{{ url('/auth/twitter') }}">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="{{ url('/auth/google') }}">
                                            <i class="fa fa-google-plus"></i> Google Plus
                                        </a>
                                    </div>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="{{ route('login') }}" method="POST" class="login-form">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Email</label>
                                        <input type="text" name="email" id="email" placeholder="Email..." class="form-username form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
                                    </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    <button type="submit" class="btn">Login!</button>
                                </form>
                                <a href="{{ url('/password/reset') }}">Need help?</a>
                                <a href="{{ url('/register') }}" style="margin-left: 360px;">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="form/js/jquery-1.11.1.min.js"></script>
        <script src="form/bootstrap/js/bootstrap.min.js"></script>
        <script src="form/js/jquery.backstretch.min.js"></script>
        <script src="form/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>