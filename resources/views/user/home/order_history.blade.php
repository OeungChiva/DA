<!DOCTYPE html>
<html>
<head>
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
.container {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;
}
.table-responsive {
    display: block;
    overflow-x: auto;
    width: 100%;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}

.nav {
    display: flex;
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    flex-wrap: wrap;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    border: 1px solid rgba(0, 0, 0, .05);
    border-radius: .375rem;
    background-color: #fff;
    background-clip: border-box;
}

.card-header {
    margin-bottom: 0;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, .05);
    background-color: #fff;
}

.border-0 {
    border: 0 !important;
}

.rounded-circle {
    border-radius: 50% !important;
}

.d-flex {
    display: flex !important;
}

.justify-content-end {
    justify-content: flex-end !important;
}

.align-items-center {
    align-items: center !important;
}
.mb-0 {
    margin-bottom: 0 !important;
}

.mr-2 {
    margin-right: .5rem !important;
}

.mr-3 {
    margin-right: 1rem !important;
}

.mr-4 {
    margin-right: 1.5rem !important;
}

.mt-5 {
    margin-top: 3rem !important;
}

.mb-5 {
    margin-bottom: 3rem !important;
}



.py-4 {
    padding-top: 1.5rem !important;
}

.py-4 {
    padding-bottom: 1.5rem !important;
}

.m-auto {
    margin: auto !important;
}
.avatar {
    font-size: 1rem;
    display: inline-flex;
    width: 48px;
    height: 48px;
    color: #fff;
    border-radius: 50%;
    background-color: #adb5bd;
    align-items: center;
    justify-content: center;
}

.avatar img {
    width: 100%;
    border-radius: 50%;
}

.avatar-sm {
    font-size: .875rem;
    width: 36px;
    height: 36px;
}

.avatar-group .avatar {
    position: relative;
    z-index: 2;
    border: 2px solid #fff;
}

.avatar-group .avatar:hover {
    z-index: 3;
}

.avatar-group .avatar + .avatar {
    margin-left: -1rem;
}

.table thead th {
    font-size: .65rem;
    padding-top: .75rem;
    padding-bottom: .75rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    border-bottom: 1px solid #e9ecef;
}

.table th {
    font-weight: 600;
}

.table td .progress {
    width: 120px;
    height: 3px;
    margin: 0;
}

.table td,
.table th {
    font-size: .8125rem;
    white-space: nowrap;
}

.table.align-items-center td,
.table.align-items-center th {
    vertical-align: middle;
}

.table .thead-dark th {
    color: #4d7bca;
    background-color: #1c345d;
}

.table .thead-light th {
    color: #8898aa;
    background-color: #f6f9fc;
}

.table-flush td,
.table-flush th {
    border-right: 0;
    border-left: 0;
}

.table-flush tbody tr:first-child td,
.table-flush tbody tr:first-child th {
    border-top: 0;
}

.table-flush tbody tr:last-child td,
.table-flush tbody tr:last-child th {
    border-bottom: 0;
}

.card .table {
    margin-bottom: 0;
}

.card .table td,
.card .table th {
    padding-right: 1.5rem;
    padding-left: 1.5rem;
}

p {
    font-size: 1rem;
    font-weight: 300;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .btn {
        margin-bottom: 10px;
    }
}

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
.custom{
  padding-top: 100px;
}


  </style>
</head>
<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="frontend/images/Prohok-Ktis.jpg" alt="">
    </div>
    <!-- header section strats -->
    @include('user.layout.header')
    
    <!-- header section strats -->
    <!-- end header section -->
  </div>

<!-- Modal -->
{{-- @foreach ($order as $index => $singleOrder)

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate:{{$singleOrder->item_title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="rating-css">
          <div class="star-icon">
              <input type="radio" value="1" name="product_rating" checked id="rating1">
              <label for="rating1" class="fa fa-star"></label>
              <input type="radio" value="2" name="product_rating" id="rating2">
              <label for="rating2" class="fa fa-star"></label>
              <input type="radio" value="3" name="product_rating" id="rating3">
              <label for="rating3" class="fa fa-star"></label>
              <input type="radio" value="4" name="product_rating" id="rating4">
              <label for="rating4" class="fa fa-star"></label>
              <input type="radio" value="5" name="product_rating" id="rating5">
              <label for="rating5" class="fa fa-star"></label>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endforeach --}}

  <!-- about section -->

    {{-- <div class="main-content">
      <div class="container mt-7">
          <div class="col">
            <div class="card shadow">
              <div class="card-header border-0">
                <h3 class="mb-0">Order History</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center ">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Foods</th>
                      <th scope="col"></th>
                      
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date</th>
                      <th scope="col">Invoice</th>

                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $orderGroups = $order->groupBy('created_at');
                      $counts = 1;
                    @endphp
                    @foreach ($orderGroups as $orderGroup)
                      @foreach ($orderGroup as $index => $row)
                        <tr>
                          @if ($index === 0)
                            <td rowspan="{{ $orderGroup->count() }}">{{ $counts++ }}</td>
                          @endif
                          <td>
                            <span>
                              <img src="{{url('upload/item_images/'.$row->image)}}" alt="" width="50" class="img-fluid rounded shadow-sm">
                            </span>
                            {{ $row->item_title }}
                          </td>
                          <td>
                            <a href="{{ route('user.review', ['Orderid' => $row->id]) }}">Review</a>
                          </td>
                          <td>{{ $row->quantity }}</td>
                          <td>{{ $row->price }}$</td>
                          
                          @if ($index === 0)
                            <td rowspan="{{ $orderGroup->count() }}">
                              {{ $row->delivery_status }}
                              <br>
                              @if ($row->payment_status === 'paid')
                                <span class="text-success">{{ $row->payment_status }}</span>
                              @elseif ($row->payment_status === 'cash on delivery')
                                <span class="text-warning">{{ $row->payment_status }}</span>
                              @else
                                {{ $row->payment_status }}
                              @endif
                            </td>
                          @endif
                          @if ($index === 0)
                            <td rowspan="{{ $orderGroup->count() }}">{{ $row->created_at }}</td>
                          @endif
                          @if ($index === 0)
                            <td rowspan="{{ $orderGroup->count() }}">
                              <a href="{{ route('user.invoice', ['orderId' => $row->order_id]) }}" target="_blank">Invoice</a>
                            </td>
                          @endif
                          
                        </tr>
                      @endforeach
                    @endforeach
                    
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- <div class="main-content">
      <div class="container mt-7">
        <!-- Table -->
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Order History</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foods</th>
                    <th scope="col"></th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Invoice</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $counts = 1;
                  @endphp
                  @foreach ($order as $order)
                  @foreach ($order->orderItems as $index => $item)
                  <tr>
                    @if ($index === 0)
                    <td rowspan="{{ $order->orderItems->count() }}">{{ $counts++ }}</td>
                    @endif
                    <td>
                      <span>
                        <img src="{{ url('upload/item_images/'.$item->image) }}" alt="" width="50"
                          class="img-fluid rounded shadow-sm">
                      </span>
                      {{ $item->orderItems->item_title }}
                    </td>
                    <td>
                      <a href="{{ route('user.review', ['Orderid' => $order->id]) }}">Review</a>
                    </td>
                    <td>{{ $item->pivot->quantity }}</td>
                    <td>{{ $item->pivot->price }}$</td>
    
                    @if ($index === 0)
                    <td rowspan="{{ $order->items->count() }}">
                      {{ $order->delivery_status }}
                      <br>
                      @if ($order->payment_status === 'paid')
                      <span class="text-success">{{ $order->payment_status }}</span>
                      @elseif ($order->payment_status === 'cash on delivery')
                      <span class="text-warning">{{ $order->payment_status }}</span>
                      @else
                      {{ $order->payment_status }}
                      @endif
                    </td>
                    @endif
                    @if ($index === 0)
                    <td rowspan="{{ $order->items->count() }}">{{ $order->created_at }}</td>
                    @endif
                    @if ($index === 0)
                    <td rowspan="{{ $order->items->count() }}">
                      <a href="{{ route('user.invoice', ['orderId' => $order->order_id]) }}" target="_blank">Invoice</a>
                    </td>
                    @endif
    
                  </tr>
                  @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="main-content">
      <div class="container mt-7 custom">
          <!-- Table -->
          <div class="col">
              <div class="card shadow">
                  <div class="card-header border-0">
                      <h3 class="mb-0">Order History</h3>
                  </div>
                  <div class="table-responsive">
                      <table class="table align-items-center">
                          <thead class="thead-light">
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Foods</th>
                                  <th scope="col"></th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Invoice</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                              $counts = 1;
                              @endphp
                              @foreach ($order as $order)
                                  @foreach ($order->orderItems as $index => $item)
                                      <tr>
                                          @if ($index === 0)
                                              <td rowspan="{{ $order->orderItems->count() }}">{{ $counts++ }}</td>
                                          @endif
                                          <td>
                                              <span>
                                                  <img src="{{ url('upload/item_images/'.$item->items->image) }}" alt=""
                                                      width="50" class="img-fluid rounded shadow-sm">
                                              </span>
                                              {{ $item->items->title }}
                                          </td>
                                          {{-- <td>
                                              <a href="{{ route('user.review', ['Orderid' => $item->items->id]) }}">Review</a>
                                          </td> --}}
                                          <td>
                                            <a href="{{ route('user.review', ['orderId' => $item->item_id]) }}">
                                              <button class="btn btn-primary">
                                                Review
                                              </button>
                                            </a>
                                          </td>
                                          <td>{{ $item->quantity }}</td>
                                          <td>{{ $item->price }}$</td>
  
                                          @if ($index === 0)
                                              <td rowspan="{{ $order->orderItems->count() }}">
                                                  {{ $order->delivery_status }}
                                                  <br>
                                                  @if ($order->payment_status === 'paid')
                                                      <span class="text-success">{{ $order->payment_status }}</span>
                                                  @elseif ($order->payment_status === 'cash on delivery')
                                                      <span class="text-warning">{{ $order->payment_status }}</span>
                                                  @else
                                                      {{ $order->payment_status }}
                                                  @endif
                                              </td>
                                          @endif
                                          @if ($index === 0)
                                              <td rowspan="{{ $order->orderItems->count() }}">{{ $order->created_at }}</td>
                                          @endif
                                          @if ($index === 0)
                                              <td rowspan="{{ $order->orderItems->count() }}">
                                                  <a href="{{ route('user.invoice', ['orderId' => $order->id]) }}"
                                                      target="_blank">
                                                      
                                                      <button class="btn btn-primary">
                                                        <i class="fa fa-file"></i> Invoice
                                                      </button>
                                                      
                                                    </a>
                                              </td>
                                          @endif
  
                                      </tr>
                                  @endforeach
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
    
    
  





 <!-- end about section -->
  @include('user.layout.footer')
  <!-- footer section -->
  @include('user.js.script')
  
</body>
</html>




