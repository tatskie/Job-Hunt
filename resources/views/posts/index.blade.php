@extends('layouts.app')

@section('content')
<h1>{{ucwords($post->title)}}</h1>
<p class="card-text">Salary: <small>{{ucwords($post->salary)}}</small></p>
<div class="row">

  <div class="col-4">
    <div class="form-group">
             <!--Panel-->
            <div class="card card-body">
              <div class="list-group">
                <a href="#" class="list-group-item active">
                  Operations
                </a>
                  @if($post->user_id == Auth::user()->id)
                    <a href="#" class="list-group-item" data-target="#EditPost" data-toggle="modal">Edit Post</a>
                    <a href="#" class="list-group-item" data-target="#DeletePost" data-toggle="modal">Delete Post</a>
                  @else
                    @if(Auth::user()->verified == false)
                    <a href="#" class="list-group-item" data-target="#create" data-toggle="modal">Apply now</a>

                    <div id="create" class="modal fade" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Apply Job</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                           <form enctype="multipart/form-data" action="{{url('reply')}}" method="POST" novalidate>
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <input type="hidden" name="post_id" value="{{ $post->id }}">
                                              <div class="row">
                                                
                                              <div class="col-12">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" id="title" name="subject" class="form-control" required>
                                                    <label for="defaultForm-email">Subject</label>
                                                </div>
                                              </div>
                                            </div>
                                              <!-- <div class="col-6">
                                                <div class="form-group"> 
                                                  <input type="file" name="resume" required>
                                                  <label for="defaultForm-email">Upload Updated Resume</label>
                                                </div>
                                              </div>  -->                       
                                              <div class="col-12">
                                                <div class="form-group">  

                                                <div class="form-group basic-textarea">
                                                    <label for="exampleFormControlTextarea1">Cover Letter</label>
                                                    <textarea class="form-control" id="job" name="cover_letter" rows="3" required>
                                                      
Dear {{ucwords($post->company->name)}},
<br>
<br>
{{ucwords($post->company->name)}} is known for [characteristic] and I would love the chance to contribute to this reputation as your next [job title].

<br>
<br>

I’m ready to leverage my background in a role with a team that values [quality], and [company or department name] seems like the right place to do this.
<br>
<br>
Thank you for your time,
<br>
[Yo’ name!]
                                                    </textarea>
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
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="submit" id="add">Submit</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                      @endif
                  @endif 
                    @if($post->user_id == Auth::user()->id)
                      @if(count($post->replies) == 0)
                        <a href="#" class="list-group-item">
                          Total Applicants {{count($post->replies)}}
                          @if(empty($post->replies))
                            0
                          @endif
                        </a>
                      @else
                        <a href="{{route('posts.reply.index', $post->id)}}" class="list-group-item">
                          Total Applicants {{count($post->replies)}}
                          @if(empty($post->replies))
                            0
                          @endif
                        </a>
                      @endif
                    @else
                    <a href="#" class="list-group-item">
                      Total Applicants {{count($post->replies)}}
                      @if(empty($post->replies))
                        0
                      @endif
                    </a>
                    @endif
              </div>
                  
            </div>
            <!--/.Panel-->
    </div>

    <div class="form-group">
             <!--Panel-->
            <div class="card card-body">
                <div >
                  <p class="card-text">{{ucwords($post->contact)}}</p>
                </div>  
            </div>
            <!--/.Panel-->
    </div>
  </div>

  <div class="col-8">
    <div class="form-group">
             <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">{{ucwords($post->company->address)}} |
                      {{ucwords($post->company->name)}} |
                      {{$post->updated_at->diffForHumans()}}
                </h4>
                <div style="text-align: left;">
                  <p class="card-text">{!! $post->job !!}</p>
                </div>
            </div>
            <!--/.Panel-->
    </div>
  </div>
</div>
      @if($post->user_id == Auth::user()->id)
                          <!--Edit Post-->
                          <div id="EditPost" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Edit Post.</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($post, [
                                                'method' => 'PATCH',
                                                'url' => ['posts', $post->id],
                                                'class' => 'form-horizontal'
                                            , 'novalidate']) !!}
                                            <div class="container">
                                            <div class="row">
                                               <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                
                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control" required>
                                                    <label for="defaultForm-email">Title</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <select class="form-control" name="category_id" id="category_id" value="{{$post->category_id}}" required>
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
                                                    <input type="number" id="salary" name="salary" class="form-control" value="{{$post->salary}}" required>
                                                    <label for="defaultForm-email">State the salary</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-4">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="city" name="city" value="{{$post->city}}" class="form-control" required>
                                                    <label for="defaultForm-email">State your city</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="form-group basic-textarea">
                                                    <label for="exampleFormControlTextarea1">Contact Details</label>
                                                    <textarea class="form-control" id="contact" name="contact" rows="3" value="" required>{{$post->contact}}</textarea>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="form-group basic-textarea">
                                                    <label for="exampleFormControlTextarea1">Job Details</label>
                                                    <textarea class="form-control" id="job" name="job" rows="3" required>{!!$post->job!!}</textarea>
                                                  <script>
                                                    var editor_config = {
                                                      path_absolute : "",
                                                      selector: "textarea[name=job]",
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
                                            <button class="btn btn-primary btn-sm" type="submit" id="add"><i class="fa fa-pencil" aria-hidden="true"></i> Update Post</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal"><i class="fa fa-remove" aria-hidden="true"></i> Close</button>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>     

                <!-- Delete Modal -->
                <div id="DeletePost" class="modal fade" role="dialog">
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
          @endif
@endsection
