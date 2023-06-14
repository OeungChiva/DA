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
    /* body{margin-top:20px;
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
    } */
    .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
        .table-condensed > tbody > tr > td,
        .table-condensed > tbody > tr > th,
        .table-condensed > thead > tr > td,
        .table-condensed > thead > tr > th {
            border: none;
        }
        .container{
            margin-top: 25px;
        }

</style>

</head>
<body class="sub_page">

<!-- about section -->

    
{{-- <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-right font-size-15">Invoice #{{$order->order_id}} 
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
                            
                        </div>
                        
                        
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
                                    </thead>
                                    <tbody>
                                        <?php $totalprice=0; ?>
                                        @foreach ($order->orderItems as $index => $row)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $row->item_title }}</h5>
                                                    </div>
                                                </td>
                                                <td>$ {{ $row->price / $row->quantity }}</td>
                                                <td>{{ $row->quantity }}</td>
                                                <td class="text-end">$ {{$row->price}}</td>
                                            </tr>
                                            <?php $totalprice += $row->price; ?>
                                        @endforeach
                            
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                            <td class="text-end">${{$totalprice}}</td>
                                        </tr>
                            
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Shipping</th>
                                            <td class="border-0 text-end">$0</td>
                                        </tr>
                            
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Tax</th>
                                            <td class="border-0 text-end">$0</td>
                                        </tr>
                            
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end"><h4 class="m-0 fw-semibold">${{$totalprice}}</h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <p class="text-center">Thanks for your order!</p>
                            </div>
                            
                            <div class="d-print-none mt-4">
                                <div class="float-right">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> --}}

<div class="container">
    
    <div class="row">
        
        <div class="col-md-12">
            
            <div class="invoice-title">
                <h3>Invoice</h3>
                <h3 class="float-right">Order # {{$order->order_id}}</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <address>
                    <strong>Billed From:</strong><br>
                        Khmer Foods<br>
                        +84 888255118<br>
                        khmerfoods@gmail.com<br>
                        Ngo 74, Truong Chinh, Phuong Mai, Dong Da, Hanoi
                        
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                    <strong>Shipped To:</strong><br>
                        {{$order->name}}<br>
                        {{$order->phone}}<br>
                        {{$order->email}}<br>
                        {{$order->address}}
                        
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        {{$order->payment_status}}<br>
                        
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        {{$order->created_at}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>#</strong></td>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalprice=0; ?>
                                @foreach ($order->orderItems as $index => $orderItem)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $orderItem->items->title }}</td>
                                    <td class="text-center">${{ $orderItem->price }}</td>
                                    <td class="text-center">{{ $orderItem->quantity }}</td>
                                    <td class="text-right">${{ $orderItem->price * $orderItem->quantity }}</td>
                                </tr>
                                <?php $totalprice=$totalprice + ($orderItem->price*$orderItem->quantity); ?>
                                @endforeach                             
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">{{$totalprice}}$</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>

                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">0$</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>

                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right"><strong>{{$totalprice}}$</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="d-print-none">
        <div class="float-right">
            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i>PRINT</a>
        
        </div>
    </div><br>
</div>





<!-- end about section -->

<!-- footer section -->
@include('user.js.script')
</body>
</html>




