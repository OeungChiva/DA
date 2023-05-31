<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    @include('user.css.style')
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> --}}
<style>
    
    .modal-body {
    background-color: #fff;
    border-color: #fff;

}


.close {
    color: #000;
    cursor: pointer;
}

.close:hover {
    color: #000;
}


.theme-color{

    color: #004cb9;
}
hr.new1 {
    border-top: 2px dashed #fff;
    margin: 0.4rem 0;
}


.btn-primary {
    color: #fff;
    background-color: #004cb9;
    border-color: #004cb9;
    padding: 12px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 1px;
    font-size: 17px;
}


.btn-primary:hover {
    color: #fff;
    background-color: #004cb9;
    border-color: #004cb9;
    padding: 12px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 1px;
    font-size: 17px;
}

</style>
</head>
<body class="sub_page">

<div class="hero_area">
    <div class="bg-box">
        <img src="frontend/images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    {{-- @include('user.layout.header') --}}
    
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span>
                Khmer Foods
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/booking') }}">Book Table</a>
                </li>
                </ul>
                <div class="user_option">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 nav_search-input" type="search" placeholder="Search" aria-label="Search" style="display:none;">
                    <button class="btn my-2 my-sm-0 nav_search-btn" type="button">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
                <div  class="nav-item ">
                <a class="cart_link " href="{{ url('/cart') }}">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                        <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                    c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                        </g>
                    </g>
                    <g>
                        <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                    C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                    c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                    C457.728,97.71,450.56,86.958,439.296,84.91z" />
                        </g>
                    </g>
                    <g>
                        <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                    c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    </svg>
                    @auth
                    <span class="cart_count" style="color: #ffbe33">({{$count}})</span>
                    @endif
                </a>
                </div>
                @auth
                <a class="user_link" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(!empty(Auth::guard('web')->user()->image))
                        <img class="rounded-circle" src="{{asset('frontend/user_images/'.Auth::guard('web')->user()->image)}}" width="30px" height="30px" alt="User Image">
                    @else
                        <img src="{{asset('frontend/user_images/no_image.jpg/')}}" width="30px" class="rounded-circle" alt="User Image">
                    @endif
                </a>
                @else
                <a class="user_link" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                @endif
                <div class="dropdown-menu dropdown-menu-right" >
                    @auth                
                    <a class="dropdown-item" href="{{url('/profile')}}"><i class="fa fa-user"></i> Profile</a>                 
                    <form action="{{route('user_logout')}}" method="POST">
                        @csrf
                        <a class="dropdown-item" href="{{ route('user_logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i>
                        Logout
                        </a>
                    </form>
                    @else
                    <a class="dropdown-item" href="{{ route('user_login.post') }}">
                    <i class="fa fa-sign-in fa-lg"></i> 
                        Login
                    </a>
                    <a class="dropdown-item" href="{{ route('register.post') }}">
                    <i class="fa fa-user-plus"></i>
                        Register
                    </a>
                    @endif
                </div>
                </div>
            </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
</div>
<!-- about section -->

{{-- <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-info"></i> Get information
</button> --}}
{{-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="text-right"> 
                    <a href="{{url('/')}}">
                    <i class="fa fa-close close" data-dismiss="modal"></i> 
                    </a>
                </div>
                
                <div class="px-4 py-5">

                    <h5 class="text-uppercase">{{ $orderData->name }}</h5>



                <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4>

                <span class="theme-color">Payment Summary</span>
                <div class="mb-3">
                    <hr class="new1">
                </div>

                <div class="d-flex justify-content-between">
                    <span class="font-weight-bold">{{ $orderData->item_title }}(Qty:{{ $orderData->quantity }})</span>
                    <span class="text-muted">${{ $orderData->price }}</span>
                </div>

                <div class="d-flex justify-content-between">
                    <small>Shipping</small>
                    <small>$0</small>
                </div>


                <div class="d-flex justify-content-between">
                    <small>Tax</small>
                    <small>$0</small>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
                    <span class="font-weight-bold">Total</span>
                    <span class="font-weight-bold theme-color">${{ $orderData->price }}</span>
                </div>  



                {{-- <div class="text-center mt-5">


                    <button class="btn btn-primary">Track your order</button>
                    


                </div>                    --}}

                </div>


            </div>
        </div>
    </div>
{{-- </div> --}}

<!-- end about section -->
@include('user.layout.footer')
    <!-- footer section -->
@include('user.js.script')
</body>
</html>




