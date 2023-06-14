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
        {{-- <li class="treeview ">
            <a class="app-menu__item " href="#" data-toggle="treeview">
                <i class="fa fa-cog fa-lg"></i> &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Setting</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>  
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/update_password')}}">
                        <i class="icon fa fa-circle-o"></i> Update Password
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/update_details')}}">
                        <i class="icon fa fa-circle-o"></i> Update Details
                    </a>
                </li>
            
            </ul>
        </li> --}}
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
                <i class="app-menu__icon fa fa-file-text"></i>
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
                <i class="fa fa-book"></i>
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
                <i class="fa fa-table"></i>
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
                <i class="fa fa-table"></i>
                &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Reservations</span>
            </a>
        </li>
        <li class="treeview is-expanded">
            <a class="app-menu__item" href="#" data-toggle="treeview">
              <i class="fa fa-table"></i>
              &nbsp;&nbsp;&nbsp;
              <span class="app-menu__label">Orders</span>
              <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
              <li>
                <a class="treeview-item" href="{{url('/admin/order')}}">
                  <i class="icon fa fa-circle-o"></i> Show Orders
                </a>
              </li>
              <li>
                <a class="treeview-item active" href="{{url('/admin/create_order')}}">
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
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="tile">               
                    {{-- <h3 class="tile-title">Create New User</h3>            --}}
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>Create New Menu</h2>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ url('admin/menu') }}">
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
                        <form class="form-horizontal" method="POST" action="{{ route('admin.create_menu.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="menu_name" type="text" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-8">
                                    {{-- <input class="form-control" name="menu_description" type="email" placeholder="Enter email address"> --}}
                                    <textarea class="form-control" rows="4" name="menu_description" placeholder="Enter description"></textarea>
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