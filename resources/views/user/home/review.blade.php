<!DOCTYPE html>
<html>
<head>
    <base href="/public">
  @include('user.css.style')
  <style>
    
    /* .row{
      width: 90%;
      margin-left: 5%;
    }
    .custom-input {
      width: 30%;
      margin-left: 35%;
    } */
    /* rating */
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }

/* End of Star Rating */



  </style>
</head>
<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="frontend/images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    @include('user.layout.header')
    
    <!-- header section strats -->
    <!-- end header section -->
  </div>
  <!-- about section -->
  {{-- <div>
    <h4>Add review for</h4>
    <hr>
    <div>
        <div>
            <img src="{{url('upload/item_images/'.$order->image)}}" alt="" width="50" class="img-fluid rounded shadow-sm">
        </div>
        <div>
            <strong>{{$order->item_title}}</strong>
        </div>
    </div>
  </div> --}}
  <div class="container mb-4">
    <strong><h4 class="text-center mt-4">Add Review</h4></strong>
    <hr>
    {{-- <div class="col-6">
    <div class="row align-items-center">
      <div class="col-2">
        <img src="{{ url('upload/item_images/'.$order->image) }}" alt="" class="img-fluid rounded shadow-sm" width="300">
      </div>
      <div class="col-10">
        <div class="d-flex align-items-center">
          <strong>{{ $order->item_title }}</strong>
        </div>
      </div>
    </div>
    </div>
    <div class="col-6">
    <div class="mt-4">
        Your rate
    </div>
    <div class="mt-4">
        Your comment
    </div>
    </div> --}}
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
    <form action="{{ route('user.reviewPost', ['Orderid' => $order->id]) }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="row align-items-center">
            <div class="col-5">
              <img src="{{ url('upload/item_images/'.$order->image) }}" alt="" class="img-fluid rounded shadow-sm" width="500">
            </div>
            <div class="col-7">
              <div class="d-flex align-items-center">
                <strong>{{ $order->item_title }}</strong>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="mt-4">
            <h5>Rating</h5>
          </div>
          <div class="rating-css">
            <div class="star-icon">
                <input type="radio" value="1" name="product_rating" {{ ($existingReview && $existingReview->stars_rated == 1) ? 'checked' : '' }} id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" value="2" name="product_rating" {{ ($existingReview && $existingReview->stars_rated == 2) ? 'checked' : '' }} id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" value="3" name="product_rating" {{ ($existingReview && $existingReview->stars_rated == 3) ? 'checked' : '' }} id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" value="4" name="product_rating" {{ ($existingReview && $existingReview->stars_rated == 4) ? 'checked' : '' }} id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" value="5" name="product_rating" {{ ($existingReview && $existingReview->stars_rated == 5) ? 'checked' : '' }} id="rating5">
                <label for="rating5" class="fa fa-star"></label>
            </div>
          </div>
          <div class="mt-4">
            <h5>Comment</h5>
            
          </div>
          <textarea name="comment" id="comment" rows="4" class="form-control">{{ $existingReview ? $existingReview->comment : '' }}</textarea>
        </div>
      </div>
      <div class="form-button mt-3 text-center">
        <button type="submit" class="btn btn-primary" id="submit">SUBMIT</button>
      </div>
    </form>
    
  </div>
  
  
  





 <!-- end about section -->
  @include('user.layout.footer')
  <!-- footer section -->
  @include('user.js.script')
</body>
</html>




