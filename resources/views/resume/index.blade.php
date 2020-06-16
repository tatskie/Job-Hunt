<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>One Page Resume</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url({{url('user/noise.jpg')}}); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        span {
            font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal;
        }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
</head>

<body>

    <div id="page-wrap">
    
        <img src="{{url('user/'. Auth::user()->avatar)}}" alt="Photo of Cthulu" id="pic" style="width: 200px; height: 200px;" />
    
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn">{{ucfirst(Auth::user()->last_name)}}, {{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->middle_initial)}}</h1>
        
            <p>
                
                Cell: <span class="tel">{{Auth::user()->contact}}</span><br />
                Email: <a class="email" href="mailto:greatoldone@lovecraft.com">{{Auth::user()->email}}</a>
            </p>
        </div>
                
        <div id="objective">
            <p>
                Job Description: Web Developer
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                @if(count(Auth::user()->educations) == 0)

                <h2>Please add your educational background!<small><a href="#"> click here!</a></small></h2>
                    <p><strong>Major:</strong> None<br />
                       <strong>Minor:</strong> None</p>

                @endif

                @forelse($educations = Auth::user()->educations->where('discription', '=', 'Tertiary') as $education)
                <h2>{{ucwords($education->school)}}</h2>
                <span>{{ucwords($education->address)}}</span>
                <p>
                    @if(!empty($education->course))
                    <strong>Course:</strong> {{ucwords($education->course)}}
                    <br />
                    @endif
                    
                   <strong>School Year:</strong> {{$education->year_start}} - {{$education->year_end}}
               </p>
                @empty

                    
                @endforelse

                @forelse($educations = Auth::user()->educations->where('discription', '=', 'Associate') as $education)
                <h2>{{ucwords($education->school)}}</h2>
                <span>{{ucwords($education->address)}}</span>
                <p>
                    @if(!empty($education->course))
                    <strong>Course:</strong> {{ucwords($education->course)}}
                    <br />
                    @endif
                    
                   <strong>School Year:</strong> {{$education->year_start}} - {{$education->year_end}}
               </p>
                @empty

                   
                @endforelse

                 @forelse($educations = Auth::user()->educations->where('discription', '=', 'Vocational') as $education)
                <h2>{{ucwords($education->school)}}</h2>
                <span>{{ucwords($education->address)}}</span>
                <p>
                    @if(!empty($education->course))
                    <strong>Course:</strong> {{ucwords($education->course)}}
                    <br />
                    @endif
                      
                    <strong>School Year:</strong> {{$education->year_start}} - {{$education->year_end}}
               </p>
                @empty

                   
                @endforelse

                @forelse($educations = Auth::user()->educations->where('discription', '=', 'Secondary') as $education)
                <h2>{{ucwords($education->school)}}</h2>
                <span>{{ucwords($education->address)}}</span>
                <p>
                    @if(!empty($education->course))
                    <strong>Course:</strong> {{ucwords($education->course)}}
                    <br />
                    @endif
                    
                   <strong>School Year:</strong> {{$education->year_start}} - {{$education->year_end}}
               </p>
                @empty

                   
                @endforelse

                 @forelse($educations = Auth::user()->educations->where('discription', '=', 'Primary') as $education)
                <h2>{{ucwords($education->school)}}</h2>
                <span>{{ucwords($education->address)}}</span>
                <p>
                    @if(!empty($education->course))
                    <strong>Course:</strong> {{ucwords($education->course)}}
                    <br />
                    @endif
                    
                   <strong>School Year:</strong> {{$education->year_start}} - {{$education->year_end}}
               </p>
                @empty

                   
                @endforelse

            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <p class="skill">
                @forelse($skills = Auth::user()->skills as $skill)
                {{ucwords($skill->skill)}},
                @empty
                Please add your skill!<small><a href="#"> click here!</a></small>
                @endforelse
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
                @forelse($works = Auth::user()->works as $work)
                <h2>@if($work->current == 0)
                    Former
                    @endif
                    {{ucwords($work->position)}} at {{ucwords($work->company)}}
                </h2>
                <span>from {{ucwords($work->address)}}</span>
                <ul>
                    <li>
                        @if(!empty($work->discription))
                        <strong>Description: {{ucwords($work->discription)}} </strong>
                        @endif
                    </li>
                    <li>
                        @if(!empty($work->date_end))
                        <strong>Time period: {{$work->date_start}} - {{$work->date_end}}</strong>
                        @else
                        <strong>Time period: {{$work->date_start}} - Present</strong>
                        @endif
                    </li>
                    
                </ul>
                @empty
                <h2>Please add your work experience!<small><a href="#"> click here!</a></small></h2>
                @endforelse
            </dd>
            
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
    </div>

</body>

</html>