<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css.style')
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            
            
            <li >
                <a class="app-menu__item" href="{{url('/admin/users')}}" >
                    <i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;
                    <span class="app-menu__label">Users</span>         
                </a>
                
            </li>
            <li>
                <a class="app-menu__item " href="{{url('/admin/menu')}}" >
                    <i class="fas fa-utensils"></i>
                    &nbsp;&nbsp;&nbsp;
                    <span class="app-menu__label">Menus</span>
                    
                </a>
                
            </li>
            <li >
                <a class="app-menu__item" href="{{url('/admin/item')}}" >
                    <i class="fas fa-hamburger"></i>
                    &nbsp;&nbsp;&nbsp;
                    <span class="app-menu__label">Items</span>
                    
                </a>
                
            </li>
            <li >
                <a class="app-menu__item " href="{{url('/admin/table')}}" >
                    <i class="fas fa-chair"></i>
                    &nbsp;&nbsp;&nbsp;
                    <span class="app-menu__label">Tables</span>
                    
                </a>
                
            </li>
            <li>
                <a class="app-menu__item active" href="{{url('admin/booking')}}">
                    <i class="fas fa-calendar-alt"></i>
                    &nbsp;&nbsp;&nbsp;
                    <span class="app-menu__label">Reservations</span>
                </a>
            </li>
            <li >
                <a class="app-menu__item" href="{{url('/admin/order')}}" >
                    <i class="fa fa-shopping-cart"></i>
                    &nbsp;&nbsp;&nbsp;
                    <span class="app-menu__label">Orders</span>
                    
                </a>
                
            </li>
        </ul>
    </aside>
    <!-- Body-->
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Bookings</h1>          
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Bookings</li>
                <li class="breadcrumb-item active"><a href="#">All Bookings</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="tile">               
                    {{-- <h3 class="tile-title">Create New User</h3>            --}}
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>Create New Booking</h2>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.booking') }}">
                                <button type="button" class="btn btn-info add-new">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div><br>
                    <div class="tile-body">
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
                        <form class="form-horizontal" method="POST" action="{{ route('admin.create_booking.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="booking_name" type="text" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="booking_email" type="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Phone Number</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="booking_phone" type="text" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Date</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="booking_date" type="date" placeholder="Enter date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Time</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="booking_time" required="">
                                        <option value="">Select time</option>
                                        {{-- <option value="08:00">8:00 AM</option> --}}
                                        <option value="09:00">9:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                        <option value="18:00">6:00 PM</option>
                                        <option value="19:00">7:00 PM</option>
                                        <option value="20:00">8:00 PM</option>
                                        {{-- <option value="21:00">9:00 PM</option>                                      --}}
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="control-label col-md-3">Guest Number</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="booking_guest" type="number" placeholder="Enter guest number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Table</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="booking_table" required="">
                                        
                                        @foreach($table as $row)
                                        <option value="{{$row->name}}">{{$row->name}} ({{$row->guest}} Guests {{$row->location}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Message</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="booking_message" type="text" placeholder="Enter message">
                                </div>
                            </div>                       
                            
                            <div class="tile-footer">
                                <div class="row">
                                    <div class="col-md-5">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Create
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                  
                </div>
            </div>
            <div class="col-md-2"></div>        
        </div>        
    </main>
    <!-- Essential javascripts for application to work-->
    @include('admin.js.script') 
    
</body>
</html>