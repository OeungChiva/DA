<!DOCTYPE html>
<html>
<head>
  @include('user.css.style')
  <style>
    body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
  </style>
</head>
<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="frontend/images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    @include('user.layout.header')
    <!-- end header section -->

    <div class="container">
        <form method="POST" action="{{url('/profile')}}">
            @csrf
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            {{-- error message --}}
                            @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error:</strong> {{Session::get('error_message')}}
                            </div>
                            @endif
                            {{-- success message --}}
                            @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success:</strong> {{Session::get('success_message')}}
                            </div>
                            @endif
                            <div class="card-header">Profile Details</div>
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if(!empty(Auth::guard('web')->user()->image))
                                    <img class="rounded-circle p-1 bg-primary" src="{{asset('frontend/images/'.Auth::guard('web')->user()->image)}}" width="110px" alt="User Image">
                                    @else
                                    <img src="{{asset('backend/images/admin.png/')}}" width="110px" class="rounded-circle p-1 bg-primary" alt="User Image">
                                    @endif
                                    <div class="mt-3">
                                        <h4>{{Auth::guard('web')->user()->name}}</h4>
                                        {{-- <button class="btn btn-primary" name="user_image" type="file">Upload image</button> --}}
                                        <button class="btn btn-primary" onclick="document.getElementById('image-input').click()">Upload Image</button>
                                        <input id="image-input" type="file" name="user_image" style="display:none">
                                    </div>
                                </div>
                                <hr class="my-3">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">Update Profile Details</div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="user_name" class="form-control" value="{{Auth::guard('web')->user()->name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="user_email" class="form-control" value="{{Auth::guard('web')->user()->email}}" readonly="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="user_phone" class="form-control" value="{{Auth::guard('web')->user()->phone}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="user_address" class="form-control" value="{{Auth::guard('web')->user()->address}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
	</div>
  </div>
  <!-- footer section -->
  @include('user.layout.footer')
  <!-- footer section -->
  @include('user.js.script')
</body>
</html>