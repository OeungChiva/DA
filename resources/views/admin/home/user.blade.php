<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css.style')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
    }
    .table-wrapper {
        width: 700px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }
    .table-title .add-new i {
        margin-right: 4px;
    }
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }    
    table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
    table.table .form-control.error {
        border-color: #f50000;
    }
    table.table td .add {
        display: none;
    }
    </style>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        // Append table with add row form on add new button click
        $(".add-new").click(function(){
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                
                '<td>' + actions + '</td>' +
            '</tr>';
            $("table").append(row);		
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                input.each(function(){
                    $(this).parent("td").html($(this).val());
                });			
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }		
        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function(){		
            $(this).parents("tr").find("td:not(:last-child)").each(function(){
                $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            });		
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function(){
            $(this).parents("tr").remove();
            $(".add-new").removeAttr("disabled");
        });
    });
    </script>
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
        <li class="treeview is-expanded">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Users</span>
                <i class="treeview-indicator fa fa-angle-right"></i>          
            </a>
            <ul class="treeview-menu">
                {{-- <li>
                    <a class="treeview-item" href="table-basic.html">
                        <i class="icon fa fa-circle-o"></i> Basic Tables
                    </a>
                </li> --}}
                <li>
                    <a class="treeview-item active" href="{{url('/admin/users')}}">
                        <i class="icon fa fa-circle-o"></i> All Users
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-file-text"></i>
                <span class="app-menu__label">Pages</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="blank-page.html">
                        <i class="icon fa fa-circle-o"></i> Blank Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-login.html">
                        <i class="icon fa fa-circle-o"></i> Login Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-lockscreen.html">
                        <i class="icon fa fa-circle-o"></i> Lockscreen Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-user.html">
                        <i class="icon fa fa-circle-o"></i> User Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-invoice.html">
                        <i class="icon fa fa-circle-o"></i> Invoice Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-calendar.html">
                        <i class="icon fa fa-circle-o"></i> Calendar Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-mailbox.html">
                        <i class="icon fa fa-circle-o"></i> Mailbox
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-error.html">
                        <i class="icon fa fa-circle-o"></i> Error Page
                    </a>
                </li>
            </ul>
        </li>
      </ul>
    </aside>
     <!-- Body-->
     <div class="app-content">
        <div class="app-title">
            <div>
              <h1><i class="fa fa-th-list"></i> User Management</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
              <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
              <li class="breadcrumb-item">User Management</li>
              <li class="breadcrumb-item active"><a href="#">All Users</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8"><h2>All User Details</h2></div>
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                </div>
                            </div>
                        </div>
                        {{-- <table class="table table-bordered"> --}}
                        <table class="table table-hover table-bordered" id="sampleTable">
                        
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $row)
                                <tr>
                                    <td>{{$count++}}</td>                                                                                                                                      
                                    <td>
                                        
                                        {{-- <img class="rounded-circle" src="{{(!empty($row->image))
                                            ? url('frontend/user_images/'.$row->image):url('frontend/user_images/no_image.jpg')}}" 
                                            width="30px" alt="profile"> --}}
                                        {{$row->name}}
                                    </td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->address}}</td>

                                    <td>
                                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>                           
                                @endforeach()      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <!-- Essential javascripts for application to work-->
    @include('admin.js.script')
</body>
</html>