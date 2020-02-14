@extends('master-layout')
@section('title')
Role
@endsection
@section('content')
@section('css')
<style>
    /* The container */
    .containers {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 17px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    
    /* Hide the browser's default checkbox */
    .containers input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }
    
    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }
    
    /* On mouse-over, add a grey background color */
    .containers:hover input ~ .checkmark {
      background-color: #ccc;
    }
    
    /* When the checkbox is checked, add a blue background */
    .containers input:checked ~ .checkmark {
      background-color: #2196F3;
    }
    
    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }
    
    /* Show the checkmark when checked */
    .containers input:checked ~ .checkmark:after {
      display: block;
    }
    
    /* Style the checkmark/indicator */
    .containers .checkmark:after {
      left: 9px;
      top: 4px;
      width: 8px;
      height: 14px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
    </style>
@endsection
<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td" style="width:100%">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
                    <li _ngcontent-c16="" class="active1"><a _ngcontent-c16="" href="kids-now/role">Role</a></li>
                    <li _ngcontent-c16="" class="level1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/role/add">Add</a></li>

                </ul>
            </div>
        </div>

        
            <div class="mat-card">
                <div class="mat-content">
                    <div>
                        <p>Add Role*</p>
                        <form  style="width:auto;" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" style="text-transform:capitalize" class="form-control" name="role"  placeholder="Enter Role" value="{{ old('role') }}">
                            @if($errors->has('role'))
                            <p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">* {{ $errors->first('role') }}</p>
                          @endif
                        </div>
                        <label style="margin-bottom:10px" for="">Permission<label style="color:red">*</label></label>
                        <div class="row">
                            @foreach ($permissions as $item)
                                <div class="col-md-3 col-6" style="padding-left:40px"> 
                                    <label class="containers">
                                    <input type="checkbox" name="permission[]" value="{{ $item->id }}">{{ $item->name }}
                                        <span class="checkmark"></span>
                                    </label> 
                                </div>
                            @endforeach
                        </div>
                        <div>
                        <button type="submit" style="margin-top:20px" class="btn btn-primary">Save</button>
                        <a href="kids-now/role"><button style="margin-top:20px;margin-left:-30px;" type="button" class="btn btn-primary">Cancel</button></a>  
                      </div>
                      </form>
                    </div>
                </div>
            </div>
           
       
    </section>
</body>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="js/main.js"></script>


@endsection
