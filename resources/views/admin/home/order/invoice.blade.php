<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('admin.css.style')
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Data Table - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .small-width {
            width:150px; /* Adjust the width value as per your requirements */
        }
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
    </style>
</head>
<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    @include('admin.layout.header')
    <!-- Sidebar menu-->
    @include('admin.layout.sidebar')
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            @if(!empty(Auth::guard('web')->user()->image))
            <img class="app-sidebar__user-avatar" src="{{asset('backend/images/'.Auth::guard('web')->user()->image)}}" width="70px" alt="User Image">
            @else
            <img src="{{asset('backend/images/admin.png')}}" width="70px" class="img-circle elevation-2" alt="User Image">
            @endif
            <div>
            <a href="#" class="d-block">{{Auth::guard('web')->user()->name}}</a>
            <p class="app-sidebar__user-designation">Admin</p>
            </div>
        </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{url('admin/dashboard')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        
        <li class="treeview ">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Users</span>
                <i class="treeview-indicator fa fa-angle-right"></i>          
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('/admin/users')}}">
                        <i class="icon fa fa-circle-o"></i> All Users
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('/admin/create_users')}}">
                        <i class="icon fa fa-circle-o"></i> Add New User
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item " href="#" data-toggle="treeview">
                <i class="fas fa-utensils"></i>
                &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Menus</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('/admin/menu')}}">
                    <i class="icon fa fa-circle-o"></i> Show Menus
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('/admin/create_menu')}}">
                    <i class="icon fa fa-circle-o"></i> Add Menus
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview ">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fas fa-hamburger"></i>

                &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Items</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item " href="{{url('/admin/item')}}">
                    <i class="icon fa fa-circle-o"></i> Show Items
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('/admin/create_item')}}">
                    <i class="icon fa fa-circle-o"></i> Add Items
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fas fa-chair"></i>


                &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Tables</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('/admin/table')}}">
                    <i class="icon fa fa-circle-o"></i> Show Tables
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('/admin/create_table')}}">
                    <i class="icon fa fa-circle-o"></i> Add Tables
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="{{url('admin/reservation')}}">
                <i class="fas fa-calendar-alt"></i>


                

                &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Reservations</span>
            </a>
        </li>
        <li class="treeview is-expanded">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fa fa-shopping-cart"></i>

                &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Orders</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item active" href="{{url('/admin/order')}}">
                    <i class="icon fa fa-circle-o"></i> Show Orders
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('/admin/create_order')}}">
                    <i class="icon fa fa-circle-o"></i> Add Orders
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    </aside>
    <!-- Body-->
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Orders</h1>          
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Orders</li>
                <li class="breadcrumb-item active"><a href="#">All Orders</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
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
                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                
                </div>
            </div> 
        </div>
        
        

            

            
    </main>
    <!-- Essential javascripts for application to work-->
    @include('admin.js.script') 

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
    $('.order-status-select').on('change', function() {
        var select = $(this);
        var orderId = select.data('order-id');
        var status = select.val();
        var url = select.data('url');

        // Send an AJAX request to update the status
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                orderId: orderId,
                status: status
            },
            success: function(response) {
                console.log('AJAX request successful');
                console.log(response); // Debug: Check the response object
                if (response.success) {
                    // Update the delivery status text
                    $('#delivery-status-' + orderId).text(status);
                } else {
                    console.log(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX request failed');
                console.log(error); // Debug: Check the error message
            }
        });
    });
});

</script>



    
</body>
</html>