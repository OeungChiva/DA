<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css.style')
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
      
        {{-- <li class="treeview is-expanded">
          <a class="app-menu__item " href="#" data-toggle="treeview">
            <i class="fa fa-cog fa-lg"></i> &nbsp;&nbsp;&nbsp;
            <span class="app-menu__label">Setting</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>  
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item active" href="{{url('admin/update_password')}}">
                <i class="icon fa fa-circle-o"></i> 
                Update Password
              </a>
            </li>
            <li>
              <a class="treeview-item" href="{{url('admin/update_details')}}">
                <i class="icon fa fa-circle-o"></i> 
                Update Details
              </a>
            </li>
      
          </ul>
        </li> --}}
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;
              <span class="app-menu__label">Users</span>
            <i class="treeview-indicator fa fa-angle-right"></i>          
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{url('/admin/users')}}">
                <i class="icon fa fa-circle-o"></i> 
                All Users
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
        <li>
          <a class="app-menu__item" href="{{url('admin/reservation')}}">
            <i class="fa fa-table"></i>
            &nbsp;&nbsp;&nbsp;
            <span class="app-menu__label">Reservations</span>
          </a>
        </li>
        <li class="treeview">
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
          <h1><i class="fa fa-edit"></i> Update Admin Password</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item"><a href="#">Update Password</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="tile">
            <div class="row">
              <div class="col-lg-12">
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
                <form method="POST" action="{{url('admin/update_password')}}">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" id="admin_email" type="email" value="{{Auth::guard('web')->user()->email}}" readonly="" >
                  </div>
                  {{-- <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input class="form-control" id="current_password" name="current_password" 
                    type="password" placeholder="Enter current password"> <span id="verifyCurrentPwd"></span> 
                  </div> --}}
                  <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input class="form-control" id="current_password" name="current_password" 
                        type="password" placeholder="Enter current password">
                    <span id="verifyCurrentPwd"></span> 
                  </div>
                  <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input class="form-control" id="new_password" name="new_password" type="password" placeholder="Enter new password">
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Enter confirm password">
                  </div>
                  <div class="tile-footer text-center">
                    <button class="btn btn-primary" type="submit">Save</button>
                  </div>
                </form>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    @include('admin.js.script')
  </body>
</html>