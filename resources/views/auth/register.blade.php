<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UGMAD</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{asset('form/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('form/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('form/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{asset('form/css/style.css')}}">
        <link href="{{asset('date/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">

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
                                    <h3>Signup with:</h3>
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
                                <form class="login-form" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <input type="text" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" class="form-username form-control"> 
                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                             <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <input value="{{ old('last_name') }}" type="text" name="last_name" id="last_name" placeholder="Last Name..." class="form-username form-control">
                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                             <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }}">
                                                <input value="{{ old('middle_initial') }}" type="text" name="middle_initial" id="middle_initial" placeholder="M.I" class="form-username form-control">
                                                @if ($errors->has('middle_initial'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('middle_initial') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                             <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                                <!--
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input value="{{ old('date_of_birth') }}" type="text" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" class="form-username form-control">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                                -->
                                                
                                                <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input placeholder="Date of Birth" class="form-username form-control" size="16" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                                </div>
                                                <input type="hidden" id="dtp_input1" name="date_of_birth" value="" />
                                                @if ($errors->has('date_of_birth'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('date_of_birth') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                             <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <input value="{{ old('address') }}" type="text" name="address" id="address" placeholder="Address" class="form-username form-control">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                             <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                <input value="{{ old('city') }}" type="text" name="city" id="city" placeholder="City" class="form-username form-control">
                                                @if ($errors->has('city'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                             <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                <input value="{{ old('country') }}" type="text" name="country" id="country" placeholder="Country" class="form-username form-control">
                                            </div>
                                                @if ($errors->has('country'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('country') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                        <div class="col-sm-3">
                                             <div class="form-group{{ $errors->has('verified') ? ' has-error' : '' }}">

                                                <select class="form-control" name="verified" id="verified" required>
                                                    <option value="">User Type</option>
                                                    <option value="0">Applicant</option>
                                                    <option value="1">Client</option>
                                                  </select>
                                                
                                            </div>
                                                @if ($errors->has('verified'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('verified') }}</strong>
                                                    </span>
                                                @endif
                                        </div>


                                        
                                        <div class="col-sm-9">
                                             <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                                <input value="{{ old('contact') }}" type="text" name="contact" id="contact" placeholder="Contact No" class="form-username form-control">
                                            </div>
                                                @if ($errors->has('contact'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('contact') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                        <div class="col-sm-3">
                                             <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                                
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="">Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                  </select>
                                                @if ($errors->has('gender'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <input value="{{ old('email') }}" type="text" name="email" id="email" placeholder="Email" class="form-username form-control">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="form-username">Password</label>
                                        <input value="{{ old('password') }}" type="password" name="password" id="password" placeholder="Password" class="form-username form-control">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-password form-control" id="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn">Signup!</button>
                                </form>
                                <a href="{{ url('/login') }}">Back to login</a>
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
        
        <script type="text/javascript" src="date/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="date/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
    </body>

</html>