@extends('layouts.app')

@section('content')

{!!Html::script('js/app.js')!!}
<style type="text/css">
    /** rating **/
div.stars {
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #e74c3c;
  transition: all .25s;
}
.checked {
    content: '\f005';
  color: #e74c3c;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #e74c3c;
  text-shadow: 0 0 5px #7f8c8d;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}


.horline > li:not(:last-child):after {
    content: " |";
}
.horline > li {
  font-weight: bold;
  color: #ff7e1a;

}
/** end rating **/
</style>
<h1>Create your Profile for Consideration</h1>
<div class="row">
    
    <div class="col-4">
        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Skills</h4>
                <p class="card-text">Soft skills include communication, critical thinking, and conflict resolution, among others. Hard skills are quantifiable and teachable; they include specific knowledge and abilities required for a job.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('skills')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Update Profile</h4>
                <p class="card-text">The information you include in your profile will largely determine whether you are approved to join our marketplace.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('employee')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Educational Background</h4>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('educations')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>

        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <h4 class="card-title">Work Experience</h4>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <div class="flex-row">
                    <a class="btn btn-light-green" href="{{url('works')}}">Add Info</a>
                </div>
            </div>
            <!--/.Panel-->
        </div>
    </div>

    <div class="col-8">
        <div class="form-group">
            <!--Panel-->
            <div class="card card-body">
                <div class="row">
        
                    <div class="col-12">
                        <div class="table table-responsive">
                        <a href="#" class="create-modal btn btn-primary pull-right btn-sm" data-target="#create" data-toggle="modal">Add New Skill</a>
                        <br>
                        <div class="container">
                            <div class="row">
                                <!--
                                @foreach($skills as $post)
                                    <div class="col-4">
                                        <div class="form-group">
                                            
                                            <div class="card card-body">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <a class="card-link">{{ $post->skill }}</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                @endforeach
                                -->
                            </div>
                        </div>
                        

                            <table class="table table-bordered table-striped table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>Skill</th><th>Rating</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{ csrf_field() }}
                                    <?php  $no=1 ?>
                                @foreach($skills as $post)
                                    <tr class='post{{$post->id}}'>
                                        <td><a>{{ $post->skill }}</a></td>
                                        <td>

                                            
                                            @if($post->userSumRating == 1)
                                            Basic
                                            @elseif($post->userSumRating == 2)
                                            Basic
                                            @elseif($post->userSumRating == 3)
                                            Meduim
                                            @else
                                            Excelent
                                            @endif
                                            <br>
                                            @for ($i =1; $i <= $post->userSumRating; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                            
                                            
                                      </td>
                                        <td>
                                            <button class="edit-modal btn btn-info btn-sm" data-target="#modalEdit{{$post->id}}" data-toggle="modal" data-title="{{$post->skill}}"><i class="fa fa-pencil" aria-hidden="true"></i></button>

                                            <button class="edit-modal btn btn-warning btn-sm" data-target="#modalDelete{{$post->id}}" data-toggle="modal" data-title="{{$post->skill}}"><i class="fa fa-remove" aria-hidden="true"></i></button>
                                                <!-- Edit Modal -->
                                                    <div id="modalEdit{{$post->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog" role="document">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h4 class="card-text">Edit Skill</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! Form::model($post, [
                                                                    'method' => 'PATCH',
                                                                    'url' => ['skills', $post->id],
                                                                    'class' => 'form-horizontal'
                                                                ]) !!}
                                                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                                <div class="md-form">
                                                                    <input type="text" class="form-control" id="skill" name="skill" value="{{$post->skill}}" required>
                                                                    
                                                                    <label for="defaultForm-email">Skill</label>
                                                                    
                                                                </div>
                                                            </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-warning btn-sm" type="submit" id="add">Update</button>
                                                                        <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                    {!!Form::close()!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                            <!-- Delete Modal -->
                                                    <div id="modalDelete{{$post->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog" role="document">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h4 class="card-text">Delete Skill</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="card-text">Are you sure you want to delete {{ucwords($post->skill)}}?</p>
                                                            </div>
                                                                    {!! Form::open([
                                                                            'method'=>'DELETE',
                                                                            'url' => ['skills', $post->id]    
                                                                        ]) !!}
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-warning btn-sm" type="submit" id="add">Yes</button>
                                                                        <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">No</button>
                                                                    </div>
                                                                    {!!Form::close()!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div id="create" class="modal fade" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Add Skill</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!!Form::open(['url' => 'skills', 'method' => 'POST', 'id' => 'frm-insert'])!!}
                                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="skill" name="skill" required>
                                                    
                                                    <label for="defaultForm-email">Skill</label>
                                                    
                                                </div>
    
                                                <div class="stars mt-20 mb-20">
                                                     <span>Rating</span>
                                                     <br>
                                                     <input class="star star-5" value="5" id="star-5" type="radio" name="rating"/>
                                                     <label class="star star-5" for="star-5"></label>
                                                     <input class="star star-4" value="4" id="star-4" type="radio" name="rating"/>
                                                     <label class="star star-4" for="star-4"></label>
                                                     <input class="star star-3" value="3" id="star-3" type="radio" name="rating"/>
                                                     <label class="star star-3" for="star-3"></label>
                                                     <input class="star star-2" value="2" id="star-2" type="radio" name="rating"/>
                                                     <label class="star star-2" for="star-2"></label>
                                                     <input class="star star-1" value="1" id="star-1" type="radio" name="rating"/>
                                                     <label class="star star-1" for="star-1"></label>
                                                  
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="submit" id="add">Submit</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                        {!!Form::close()!!}
                                </div>
                            </div>
                        </div>

                          
                    </div>
                </div>

            </div>
            <!--/.Panel-->
        </div>

    </div>
    
</div>

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


{{-- ajax Form Add--}}
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).on('click', '.create-modal', function(){
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Skill');
        $('.error').remove();
    });

    $('#frm-insert').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var post = $(this).attr('method');
        var data = $(this).serialize();
            $.ajax({
                type : post, //method of route ...
                url : url,
                data : data, //Json Array

            success:function(data){
                console.log(data)
                $('#table').append("<tr class='post" + data.id + "'>"+
              "<td>" + data.skill + "</td>"+
              "<td><button class='edit-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.skill + "'><i class='fa fa-pencil' aria-hidden='true'></i></button> <button class='delete-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.skill  + "'><i class='fa fa-trash' aria-hidden='true'></i></button></td>"+
              "</tr>");
            }
        });
    });
    //function Add(Save)
    /*
    $('#add').click(function(){
        $.ajax({
            type : 'POST',
            url : 'addSkills',
            data : {
                '_token' : $('input[name=_token]').val(),
                'skill' : $('input[name=skill]').val(),
            },

            success: function(data){
            if ((data.errors)) {
              $('.error').show();
              $('.error').text(data.errors.title);
              $('.error').text(data.errors.body);
            } else {
              $('.error').remove();
              $('#table').append("<tr class='post" + data.id + "'>"+
              "<td>" + data.skill + "</td>"+
              "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.skill + "'><i class='fa fa-eye' aria-hidden='true'></i></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.skill + "'><i class='fa fa-pencil' aria-hidden='true'></i></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.skill  + "'><i class='fa fa-trash' aria-hidden='true'></i></button></td>"+
              "</tr>");
            }
          },
        });
        $('#title').val('');
        $('#body').val('');
        alert('success');
    });
    */
    /*
    // function Edit POST
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update Post");
        $('#footer_action_button').addClass('fa-check');
        $('#footer_action_button').removeClass('fa-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Post Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#t').val($(this).data('skill'));
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
      $.ajax({
        type: 'POST',
        url: 'editSkills',
        data: {
            '_token': $('input[name=_token]').val(),
            '_method': 'PUT',
            'id': $("#fid").val(),
            'skill': $('#t').val(),
        },
        success: function(data) {
              $('.post' + data.id).replaceWith(" "+
              "<tr class='post" + data.id + "'>"+
              "<td>" + data.skill + "</td>"+
         "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.skill + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.skill + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.skill + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
              "</tr>");
            }
          });
    });
    // form Delete function
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete Post');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('title'));
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function(){
      $.ajax({
        type: 'DELETE',
        url: 'deleteSkills',
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('.id').text()
        },
        success: function(data){
           $('.post' + $('.id').text()).remove();
        }
      });
    });
    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#ti').text($(this).data('skill'));
        $('.modal-title').text('Show Post');
    });
    */
    </script>
-->
@endsection
