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
        <li class="treeview ">
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
        <li class="treeview is-expanded">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fa fa-book"></i>
                &nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Items</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item active" href="{{url('/admin/item')}}">
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
    </ul>
    </aside>
    <!-- Body-->
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Items</h1>          
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active"><a href="#">All Items</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                <div class="tile-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('success')}}
                    </div>
                    @endif
                    <div class="table-title">
                        <div class="row">                
                            <div class="col-sm-10">
                                <h2>All Items</h2>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ route('admin.create_item') }}">
                                <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New Item</button>
                                </a>
                            </div>
                        </div><br>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead class="bg-light text-dark p-3 text-center">
                            <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Menu</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created</th>
                            <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($item as $row)
                            <tr>
                                <td>{{$count++}}</td>                              
                                <td>{{$row->title}}</td>
                                <td>{{$row->price}}$</td>
                                <td>{{$row->menu}}</td>
                                <td>{{$row->description}}</td> 
                                <td>
                                    <img class="" src="{{(!empty($row->image))
                                    ? url('upload/item_images/'.$row->image):url('frontend/user_images/no_image.jpg')}}" 
                                    width="40px" height="40px" alt="item">
                                    
                                </td>
                                <td>{{$row->created_at}}</td>
                                <td class="text-center">
                                    <a class="edit text-warning" href="{{url('/admin/update_item/'.$row->id)}}" title="Update" data-toggle="tooltip">
                                    <i class="fa fa-edit"></i>
                                    </a>                        
                                    &nbsp;
                                    <a class="delete text-danger" href="{{url('/admin/item/'.$row->id)}}" onclick="return confirm('Are you sure?')" title="Delete" data-toggle="tooltip">
                                    <i class="fa fa-trash "></i>
                                    </a>
                                    &nbsp;
                                    <a class="view text-success" title="View" data-toggle="tooltip">
                                    <i class="fa fa-eye "></i>
                                    </a>  
                                </td>
                            </tr>
                            @endforeach() 
                        </tbody>
                    </table>        
                    </div>
                </div>
                
                <div class="d-print-none">
                    <div class="float-right">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                    </div>
                </div>                
            </div>

            

            
    </main>
    <!-- Essential javascripts for application to work-->
    @include('admin.js.script') 
    
</body>
</html>