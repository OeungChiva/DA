<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css.style')
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    @include('admin.layout.header')
    @include('admin.layout.sidebar')
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        @if(!empty(Auth::guard('web')->user()->image))
        <img class="app-sidebar__user-avatar" src="{{asset('backend/images/'.Auth::guard('web')->user()->image)}}" width="70px" alt="User Image">
        @else
        <img src="{{asset('backend/images/admin.png/')}}" width="70px" class="app-sidebar__user-avatar" alt="User Image">
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
        <li class="treeview is-expanded">
          <a class="app-menu__item " href="#" data-toggle="treeview">
            <i class="fa fa-cog fa-lg"></i> &nbsp;&nbsp;&nbsp;
            <span class="app-menu__label">Setting</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>  
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item " href="{{url('admin/update_password')}}">
                <i class="icon fa fa-circle-o"></i> 
                Update Password
              </a>
            </li>
            <li>
              <a class="treeview-item active" href="{{url('admin/update_details')}}">
                <i class="icon fa fa-circle-o"></i> 
                Update Details
              </a>
            </li>     
          </ul>
        </li>
        <li class="treeview">
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
          <a class="app-menu__item" href="#" data-toggle="treeview">
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
      </ul>
    </aside>
     <!-- Body-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Update Admin Details</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item"><a href="#">Update Details</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                {{-- error message --}}
                @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error:</strong> {{Session::get('error_message')}}
                </div>
                @endif
                {{-- success message --}}
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success:</strong> {{Session::get('success_message')}}
                </div>
                @endif
                
                <form method="POST" action="{{url('admin/update_details')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" id="admin_email" type="email" value="{{Auth::guard('web')->user()->email}}" readonly="" >
                  </div>
                  <div class="form-group">
                    <label for="admin_name">Name</label>
                    <input class="form-control" id="admin_name" name="admin_name" type="text" required="" value="{{Auth::guard('web')->user()->name}}">
                  </div>
                  <div class="form-group">
                    <label for="admin_phone">Phone Number</label>
                    <input class="form-control" id="admin_phone" name="admin_phone" type="text" required="" value="{{Auth::guard('web')->user()->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="admin_image">Photo</label>
                    <input class="form-control" id="admin_image" name="admin_image" type="file">
                    @if(!empty(Auth::guard('web')->user()->image))
                      <img src="{{ asset('backend/images/'.Auth::guard('web')->user()->image) }}" alt="{{ Auth::guard('web')->user()->name }}" width="100px" height="100px">
                      <a href="{{ asset('backend/images/'.Auth::guard('web')->user()->image) }}" target="_blank">View Photo</a>
                      <input type="hidden" name="current_image" value="{{ Auth::guard('web')->user()->image }}">
                    @endif
                  </div>
                  
                  <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </form>
              </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    @include('admin.js.script')
  </body>
</html>