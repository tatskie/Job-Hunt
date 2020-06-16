@extends('layouts.app')

@section('content')
{!!Html::script('js/app.js')!!}
<h1>Create your Profile for Consideration</h1>
<div class="row">
    
    <div class="col-4">
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
                        <a href="#" class="create-modal btn btn-primary pull-right btn-sm" data-target="#modalCreate" data-toggle="modal">Add Education</a>
                        
                        <br>
                        <div class="container">
                            <div class="row">
                               
                                @foreach($educations as $edu)
                                    <div class="col-12">
                                        <div class="form-group">
                                            
                                            <!--Panel-->
                                            <div class="card card-body">
                                                <h6 class="card-title">{{ucwords($edu->school)}}</h6>
                                                <h6 class="card-title">at {{ucwords($edu->address)}}</h6>
                                                <p class="card-text">{{ucwords($edu->course)}}</p>
                                                <p class="card-text">
                                                    @if($edu->graduated == 0)

                                                    @else
                                                        Graduated
                                                    @endif
                                                </p>
                                                    <a class="card-link">{{ucwords($edu->year_start)}}
                                                    @if(!empty($edu->year_end))
                                                    |
                                                    @else

                                                    @endif
                                                    {{ucwords($edu->year_end)}}
                                                </a>
                                                <div class="flex-row">
                                                    <a class="card-link" data-target="#modalEdit{{$edu->id}}" data-toggle="modal"><i class='fa fa-pencil' aria-hidden='true'></i></a>

                                                    <a class="card-link" data-target="#modalDelete{{$edu->id}}" data-toggle="modal"><i class='fa fa-trash' aria-hidden='true'></i></a>

                                                    <!-- Edit Modal -->
                                                    <div id="modalEdit{{$edu->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog" role="document">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h4 class="card-text">Edit Education</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                            {!! Form::model($edu, [
                                                                    'method' => 'PATCH',
                                                                    'url' => ['educations', $edu->id],
                                                                    'class' => 'form-horizontal'
                                                                ]) !!}
                                                                <div class="container">
                                                                    <div class="row">
                                                                       <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                                        
                                                                        <div class="col-12">
                                                                        <div class="form-group">  

                                                                        <div class="md-form">
                                                                            <input type="text" id="school" name="school" value="{{ucwords($edu->school)}}" class="form-control" required>
                                                                            <label for="defaultForm-email">School</label>
                                                                        </div>

                                                                        </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                        <div class="form-group">
                                                                        <div class="md-form">
                                                                            <input type="text" id="address" name="address" value="{{ucwords($edu->address)}}" class="form-control" required>
                                                                            <label for="defaultForm-email">School address</label>
                                                                        </div>
                                                                        </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                        <div class="form-group">  
                                                                        @if($edu->discription == 'Primary' or $edu->discription == 'Secondary')
                                                                        <div class="md-form" id="Course{{$edu->id}}" style="display: none;">
                                                                            <input type="text" id="course" name="course" value="{{ucwords($edu->course)}}" class="form-control">
                                                                            <label id="label{{$edu->id}}" for="defaultForm-email"></label>
                                                                        </div>
                                                                        @else
                                                                        <div class="md-form" id="Course{{$edu->id}}">
                                                                            <input type="text" id="course{{$edu->id}}" name="course" value="{{$edu->course}}" class="form-control">
                                                                            <label id="label{{$edu->id}}" for="defaultForm-email"></label>
                                                                        </div>
                                                                        @endif
                                                                        </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                        <div class="form-group"> 

                                                                            <select class="mdb-select" id="discription{{$edu->id}}" name="discription">
                                                                                @if($edu->discription == 'Primary')
                                                                                <option value="Primary">Primary</option>
                                                                                <option value="Secondary">Secondary</option>
                                                                                <option value="Tertiary">Tertiary</option>
                                                                                <option value="Vocational">Vocational</option>
                                                                                <option value="Associate">Associate</option>
                                                                                @endif

                                                                                @if($edu->discription == 'Secondary')
                                                                                <option value="Secondary">Secondary</option>
                                                                                <option value="Primary">Primary</option>
                                                                                
                                                                                <option value="Tertiary">Tertiary</option>
                                                                                <option value="Vocational">Vocational</option>
                                                                                <option value="Associate">Associate</option>
                                                                                @endif

                                                                                @if($edu->discription == 'Vocational')
                                                                                <option value="Vocational">Vocational</option>
                                                                                <option value="Primary">Primary</option>
                                                                                <option value="Secondary">Secondary</option>
                                                                                <option value="Tertiary">Tertiary</option>
                                                                                
                                                                                <option value="Associate">Associate</option>
                                                                                @endif

                                                                                @if($edu->discription == 'Associate')
                                                                                <option value="Associate">Associate</option>
                                                                                <option value="Primary">Primary</option>
                                                                                <option value="Secondary">Secondary</option>
                                                                                <option value="Tertiary">Tertiary</option>
                                                                                <option value="Vocational">Vocational</option>
                                                                                
                                                                                @endif

                                                                                @if($edu->discription == 'Tertiary')
                                                                                <option value="Tertiary">Tertiary</option>
                                                                                <option value="Primary">Primary</option>
                                                                                <option value="Secondary">Secondary</option>
                                                                                
                                                                                <option value="Vocational">Vocational</option>
                                                                                <option value="Associate">Associate</option>
                                                                                @endif
                                                                                
                                                                            </select>
                                                                            <label>Education Level</label>

                                                                        </div>
                                                                        </div>

                                                                        <script type="text/javascript">
                                                                            $('#discription{{$edu->id}}').change(function() {
                                                                                opt = $(this).val();
                                                                                if (opt=="Primary") {
                                                                                    $('#Course{{$edu->id}}').hide(1000);
                                                                                    $('#course{{$edu->id}}').val('');
                                                                                    $('#course{{$edu->id}}').removeAttr('required');
                                                                                }else if (opt == "Secondary") {
                                                                                    $('#Course{{$edu->id}}').hide(1000);
                                                                                    $('#course{{$edu->id}}').val('');
                                                                                    $('#course{{$edu->id}}').removeAttr('required');
                                                                                }
                                                                                else if (opt == "Tertiary") {
                                                                                    $('#Course{{$edu->id}}').show(1000);
                                                                                    $('#label{{$edu->id}}').text('Course');
                                                                                    $('#course{{$edu->id}}').val('');
                                                                                    $('#course{{$edu->id}}').attr({'required': 'required'});
                                                                                 }
                                                                                else if (opt == "Vocational") {
                                                                                    $('#Course{{$edu->id}}').show(1000);
                                                                                    $('#label{{$edu->id}}').text('Track');
                                                                                    $('#course{{$edu->id}}').val('');
                                                                                    $('#course{{$edu->id}}').attr({'required': 'required'});
                                                                                 }
                                                                                else if (opt == "Associate") {
                                                                                    $('#Course{{$edu->id}}').show(1000);
                                                                                    $('#label{{$edu->id}}').text('Course');
                                                                                    $('#course{{$edu->id}}').val('');
                                                                                    $('#course{{$edu->id}}').attr({'required': 'required'});
                                                                                 }
                                                                            });
                                                                        </script>

                                                                        <div class="col-6">
                                                                        <div class="form-group"> 
                                                                        <div class="md-form">
                                                                            <input type="text" id="year_start" name="year_start" value="{{$edu->year_start}}" class="form-control" required>
                                                                            <label for="defaultForm-pass">Year Start</label>
                                                                        </div>
                                                                        </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                        <div class="form-group"> 
                                                                        <div class="md-form">
                                                                            <input type="text" id="year_end" name="year_end" value="{{$edu->year_end}}" class="form-control">
                                                                            <label for="defaultForm-pass">Year End</label>
                                                                        </div>
                                                                        </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                        <div class="form-group"> 
                                                                            
                                                                           
                                                                            <input type="hidden" value="0" name="graduated">    
                                                                            <input {{isset($edu['graduated'])&&$edu['graduated']=='1' ? 'checked' : ''}} value="1" type="checkbox" id="graduated" name="graduated">
                                                                            
                                                                            <label for="checkbox100">Graduated</label>
                                                                        </div>
                                                                        </div>
                                                                    </div>
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
                                                    <div id="modalDelete{{$edu->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog" role="document">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h4 class="card-text">Delete Education</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="card-text">Are you sure you want to delete {{ucwords($edu->school)}}?</p>
                                                            </div>
                                                                    {!! Form::open([
                                                                            'method'=>'DELETE',
                                                                            'url' => ['educations', $edu->id]    
                                                                        ]) !!}
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-warning btn-sm" type="submit" id="add">Yes</button>
                                                                        <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">No</button>
                                                                    </div>
                                                                    {!!Form::close()!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/.Panel-->
                                            
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>

                        </div>
                        <div id="modalCreate" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="card-text">Add Education</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            {!!Form::open(['url' => 'educations', 'method' => 'POST', 'id' => 'frm-insert', 'autocomplete' => 'off'])!!}
                                            <div class="container">
                                            <div class="row">
                                               <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                
                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    
                                              <div class="autocomplete">
                                                <input type="text" id="myInput" name="school" class="form-control" required="">
                                                <label for="defaultForm-email">School</label>
                                              </div>
                                             

                                            <script>
                                            function autocomplete(inp, arr) {
                                              /*the autocomplete function takes two arguments,
                                              the text field element and an array of possible autocompleted values:*/
                                              var currentFocus;
                                              /*execute a function when someone writes in the text field:*/
                                              inp.addEventListener("input", function(e) {
                                                  var a, b, i, val = this.value;
                                                  /*close any already open lists of autocompleted values*/
                                                  closeAllLists();
                                                  if (!val) { return false;}
                                                  currentFocus = -1;
                                                  /*create a DIV element that will contain the items (values):*/
                                                  a = document.createElement("DIV");
                                                  a.setAttribute("id", this.id + "autocomplete-list");
                                                  a.setAttribute("class", "autocomplete-items");
                                                  /*append the DIV element as a child of the autocomplete container:*/
                                                  this.parentNode.appendChild(a);
                                                  /*for each item in the array...*/
                                                  for (i = 0; i < arr.length; i++) {
                                                    /*check if the item starts with the same letters as the text field value:*/
                                                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                                                      /*create a DIV element for each matching element:*/
                                                      b = document.createElement("DIV");
                                                      /*make the matching letters bold:*/
                                                      b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                                      b.innerHTML += arr[i].substr(val.length);
                                                      /*insert a input field that will hold the current array item's value:*/
                                                      b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                                      /*execute a function when someone clicks on the item value (DIV element):*/
                                                      b.addEventListener("click", function(e) {
                                                          /*insert the value for the autocomplete text field:*/
                                                          inp.value = this.getElementsByTagName("input")[0].value;
                                                          /*close the list of autocompleted values,
                                                          (or any other open lists of autocompleted values:*/
                                                          closeAllLists();
                                                      });
                                                      a.appendChild(b);
                                                    }
                                                  }
                                              });
                                              /*execute a function presses a key on the keyboard:*/
                                              inp.addEventListener("keydown", function(e) {
                                                  var x = document.getElementById(this.id + "autocomplete-list");
                                                  if (x) x = x.getElementsByTagName("div");
                                                  if (e.keyCode == 40) {
                                                    /*If the arrow DOWN key is pressed,
                                                    increase the currentFocus variable:*/
                                                    currentFocus++;
                                                    /*and and make the current item more visible:*/
                                                    addActive(x);
                                                  } else if (e.keyCode == 38) { //up
                                                    /*If the arrow UP key is pressed,
                                                    decrease the currentFocus variable:*/
                                                    currentFocus--;
                                                    /*and and make the current item more visible:*/
                                                    addActive(x);
                                                  } else if (e.keyCode == 13) {
                                                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                                                    e.preventDefault();
                                                    if (currentFocus > -1) {
                                                      /*and simulate a click on the "active" item:*/
                                                      if (x) x[currentFocus].click();
                                                    }
                                                  }
                                              });
                                              function addActive(x) {
                                                /*a function to classify an item as "active":*/
                                                if (!x) return false;
                                                /*start by removing the "active" class on all items:*/
                                                removeActive(x);
                                                if (currentFocus >= x.length) currentFocus = 0;
                                                if (currentFocus < 0) currentFocus = (x.length - 1);
                                                /*add class "autocomplete-active":*/
                                                x[currentFocus].classList.add("autocomplete-active");
                                              }
                                              function removeActive(x) {
                                                /*a function to remove the "active" class from all autocomplete items:*/
                                                for (var i = 0; i < x.length; i++) {
                                                  x[i].classList.remove("autocomplete-active");
                                                }
                                              }
                                              function closeAllLists(elmnt) {
                                                /*close all autocomplete lists in the document,
                                                except the one passed as an argument:*/
                                                var x = document.getElementsByClassName("autocomplete-items");
                                                for (var i = 0; i < x.length; i++) {
                                                  if (elmnt != x[i] && elmnt != inp) {
                                                    x[i].parentNode.removeChild(x[i]);
                                                  }
                                                }
                                              }
                                              /*execute a function when someone clicks in the document:*/
                                              document.addEventListener("click", function (e) {
                                                  closeAllLists(e.target);
                                                  });
                                            }

                                            /*An array containing all the country names in the world:*/
                                            var countries = ["Systems Technology Institute College","University of San Jose Recoletos","University of Cebu","University of Visayas","Cebu Institute Technology University","Cebu Technology University","University of San Carlos","Asian College Technology","South Westhern University", "Velez College", "University of the Phillipines", "St. Paul College Foundation, Inc.", "Cebu Doctors University", "University of Southern Philippines Foundation"];

                                            /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                                            autocomplete(document.getElementById("myInput"), countries);
                                            </script>


                                                    
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form">
                                                    <input type="text" id="address" name="address" class="form-control">
                                                    <label for="defaultForm-email">School address</label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group">  

                                                <div class="md-form" id="Course" style="display: none;">
                                                    <input type="text" id="course" name="course" class="form-control">
                                                    <label id="label" for="defaultForm-email"></label>
                                                </div>

                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group"> 

                                                    <select class="mdb-select" id="discription" name="discription">
                                                        <option value="Primary">Primary</option>
                                                        <option value="Secondary">Secondary</option>
                                                        <option value="Tertiary">Tertiary</option>
                                                        <option value="Vocational">Vocational</option>
                                                        <option value="Associate">Associate</option>
                                                    </select>
                                                    <label>Education Level</label>

                                                </div>
                                                </div>

                                                <script type="text/javascript">
                                                    $('#discription').change(function() {
                                                        opt = $(this).val();
                                                        if (opt=="Primary") {
                                                            $('#Course').hide(1000);
                                                            $('#course').val('');
                                                            $('#course').removeAttr('required');

                                                        }else if (opt == "Secondary") {
                                                            $('#Course').hide(1000);
                                                            $('#course').val('');
                                                            $('#course').removeAttr('required');

                                                        }
                                                        else if (opt == "Tertiary") {
                                                            $('#Course').show(1000);
                                                            $('#label').text('Course');
                                                            $('#course').attr({'required': 'required'});
                                                            $('#course').val('');
                                                            
                                                         }
                                                        else if (opt == "Vocational") {
                                                            $('#Course').show(1000);
                                                            $('#label').text('Track');
                                                            $('#course').val('');

                                                            $('#course').attr({'required': 'required'});
                                                         }
                                                        else if (opt == "Associate") {
                                                            $('#Course').show(1000);
                                                            $('#label').text('Course');
                                                            $('#course').val('');
                                                            $('#course').attr({'required': 'required'});
                                                         }
                                                    });
                                                </script>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" id="year_start" name="year_start" class="form-control">
                                                    <label for="defaultForm-pass">Year Start</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-6">
                                                <div class="form-group"> 
                                                <div class="md-form">
                                                    <input type="text" id="year_end" name="year_end" class="form-control">
                                                    <label for="defaultForm-pass">Year End</label>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group"> 
                                                    <input type="checkbox" id="graduated" name="graduated" value="1">
                                                    <label for="checkbox100">Graduated</label>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <!-- Form login -->
                                            

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-sm" type="submit" id="add"><i class="fa fa-plus" aria-hidden="true"></i> Save education</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal"><i class="fa fa-remove" aria-hidden="true"></i> Close</button>
                                        </div>
                                        </form>
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
-->

@endsection
