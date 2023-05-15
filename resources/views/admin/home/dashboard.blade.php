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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
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
            <a class="app-menu__item active" href="{{url('admin/dashboard')}}">
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
                    <a class="treeview-item " href="{{url('/admin/menu')}}">
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
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="fa fa-book"></i>
            &nbsp;&nbsp;&nbsp;
            <span class="app-menu__label">Items</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{url('/admin/item')}}">
                <i class="icon fa fa-circle-o"></i> Show Items
              </a>
            </li>
            <li>
              <a class="treeview-item" href="{{url('/admin/create_menu')}}">
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
    </ul>
    </aside>
    <!-- Body-->
    <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Users</h4>
                <p><b>{{ $users_count }}</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Menus</h4>
                <p><b>{{ $menus_count }}</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <h4>Uploades</h4>
                <p><b>10</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>Stars</h4>
                <p><b>500</b></p>
              </div>
            </div>
          </div>
        </div>
      
        <div class="row">
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Users Chart</h3>
              <div>
                <canvas id="chart">
                </canvas>
              </div>    
            </div>
          </div>
          <div class="col-md-6">
            <div class="tile">
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Monthly Sales</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tile">
              <h3 class="tile-title">Support Requests</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>
        
      </main>
    <!-- Essential javascripts for application to work-->
    @include('admin.js.script') 
    <!-- User Chart script-->   
    <script>
      var ctx = document.getElementById('chart').getContext('2d');
      var userChart = new Chart(ctx,{
        type:'bar',
        data:{
          labels: {!! json_encode($labels) !!},
          datasets: {!! json_encode($datasets) !!}
        },
      });
    </script>

  </body>
  </html>