<!DOCTYPE html>
<html>
<head>
    <base href="/public">
@include('user.css.style')
<style>
    /* .row{
        width: 100%;
        margin-left: 15%;
    } */
        /* .custom-input {
        width: 30%;
        margin-left: 35%;
        } */
    body{margin-top:20px;
    background-color:#eee;
    }

    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: 1rem;
    }

</style>

</head>
<body class="sub_page">

<!-- about section -->

    
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-right font-size-15">Invoice #{{$order->order_id}} 
                                {{-- <span class="badge bg-success font-size-12 ms-2">Paid</span> --}}
                            </h4>
                            <div class="mb-4 ">
                                <h4 class="mb-1 text-muted">KhmerFoods</h4>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">Ngo 74, Truong Chinh, Phuong Mai, Dong Da, Hanoi</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> khmerfoods@gmail.com</p>
                                <p><i class="uil uil-phone me-1"></i> +84 888255118</p>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Billed To:</h5>
                                    <h5 class="font-size-15 mb-2">{{$order->name}}</h5>
                                    <p class="mb-1">{{$order->address}}</p>
                                    <p class="mb-1">{{$order->email}}</p>
                                    <p>{{$order->phone}}</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-right">
                                    <div>
                                        <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                        <p>#{{$order->order_id}}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                        <p>{{$order->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary</h5>
    
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <?php $totalprice=0; ?>
                                        @foreach ($orderItems as $row)
                                        <tr>
                                            <th scope="row">{{ $counts++ }}</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">{{ $row->item_title }}</h5>
                                                    
                                                </div>
                                            </td>
                                            <td>$ {{ $row->price/$row->quantity }}</td>
                                            <td>{{ $row->quantity }}</td>
                                            <td class="text-end">$ {{$row->price}}</td>
                                        </tr>
                                        <?php $totalprice=$totalprice + ($row->price); ?>
                                        @endforeach
                                        

                                        <!-- end tr -->
                                        
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                            <td class="text-end">${{$totalprice}}</td>
                                        </tr>
                                        <!-- end tr -->
                                        
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Shipping</th>
                                            <td class="border-0 text-end">$0</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Tax</th>
                                            <td class="border-0 text-end">$0</td>
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end"><h4 class="m-0 fw-semibold">${{$totalprice}}</h4></td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                                <hr>
                                <p class="text-center">Thanks for your order!</p>
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-right">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>




<!-- end about section -->

<!-- footer section -->
@include('user.js.script')
</body>
</html>




