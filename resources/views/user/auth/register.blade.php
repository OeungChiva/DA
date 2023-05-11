<!DOCTYPE html>
<html>
<head>
  @include('user.css.style')
  <style>
    .hero_area {
      background: url('frontend/images/hero-bg.jpg') no-repeat center center fixed;
      background-size: cover;
      position: relative;
      height: 100vh;
    }
    .form-container {
      position: absolute;
      top: 55%; 
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      /* padding: 20px; */
      border-radius: 10px;
      width: 400px;
      /* padding-top: 700px; */
    }
    /* .card{
      width: 500px;
      position: absolute;
      top: 55%; 
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      
      
    } */
  </style>
</head>
<body>
  <div class="hero_area">
    {{-- <div class="bg-box">
      <img src="frontend/images/hero-bg.jpg" alt="">
    </div> --}}
    <!-- header section strats -->
    @include('user.layout.header')
    <!-- end header section -->
    <div class="form-container">
        {{-- <h3 class="text-center">REGISTER</h3> --}}
        <div class="card-header text-center">
          {{-- <h3 style="font-weight: bold">REGISTER</h3>  --}}
          REGISTER
        </div>
        <br>
        <div class="container">
                  {{-- error message --}}
                  @if(session()->has('error'))
                  <div class="alert alert-danger" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('error')}}
                  </div>
                  
                  @endif
                  @if(session()->has('success'))
                  <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('success')}}
                  </div>
                  @endif
                  {{-- error message --}}
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="form-group">
              <label >
                <i class="fa fa-user" aria-hidden="true"></i>
                Username
              </label>
              <input type="text" class="form-control" name="name" required="">
            </div>
            <div class="form-group">
              <label >
                <i class="fa fa-envelope" aria-hidden="true"></i>
                Email
              </label>
              <input type="email" class="form-control" name="email" required="">
            </div>
            <div class="form-group">
              <label>
                <i class="fa fa-lock" aria-hidden="true"></i>
                Password
              </label>
              <input type="password" class="form-control" name="password" required="">
            </div>
            <div class="animated-checkbox">
              <label>
                <input type="checkbox" id="show-password" class="show-password"><span class="label-text"> Show Password</span>
              </label>
            </div>
            
            <div class="text-center mt-2">
              <button type="submit" class="btn btn-primary btn-circle btn-block">
                RIGISTER
              </button>
            </div>
            <div class="text-center">
              {{-- <p>Have an account? 
                <a href="{{ route('user_login.post') }}"><br>Login here!</a>
              </p> --}}
              <label>
                <span>Already have an account?</span>
                <a href="{{ route('user_login.post') }}">Login</a>
              </label>
            </div>
          </form>
        </div>     
    </div>
  </div>
  @include('user.js.script')

</body>
</html>
