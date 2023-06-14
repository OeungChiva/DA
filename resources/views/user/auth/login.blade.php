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
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      /* padding: 20px; */
      border-radius: 10px;
      width: 350px;
    }
    .alert {
  z-index: 9999;
}
  </style>
</head>
<body>
  <div class="hero_area">
    <div class="bg-box">
      <img src="frontend/images/Prohok-Ktis.jpg" alt="">
    </div>
    <!-- header section strats -->
    @include('user.layout.header')
    <!-- end header section -->
    <div class="form-container">
      <div class="card-header text-center">
        LOGIN
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
          
        <form method="POST" action="{{url('/login')}}">
            @csrf
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
                LOGIN
              </button>
            </div>
            <div class="text-center">
              {{-- <p>Don't have an account? <a href="{{ route('register.post') }}">
                <br>Create an account here!</a>
              </p> --}}
              <label>
                <span>Don't have an account?</span>
                <a href="{{ route('register.post') }}" class="">Register</a>
            </label>
            </div>
          </form>
          </div>
    </div>
  </div>
  @include('user.js.script')
</body>
</html>