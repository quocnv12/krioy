@extends('master-layout')
@section('title')
Thực đơn
@endsection
@section('content')

<body onload="time()">
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">Home</a></li>
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">Food</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Meal Type</a></li>

                </ul>
            </div>
        </div>

        <div class="row">
            <div class="mat-card">
             
                <div class="mat-content">
                    <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                 
                    <div>
          
                       
                       
                    </div>
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

