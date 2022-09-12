<?php use App\Models\Order;  ?>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="main-menu nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{url('/dashborad')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/roles')}}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>
                    Roles
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/roles/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/roles')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Roles</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/users')}}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/users/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/users')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Users</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/categories')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Categories
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/categories/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/categories')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Categories</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/cities')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Cities
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/cities/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add City</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/cities')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Cities</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Courses
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/courses/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Course</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/courses')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Courses</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    FAQ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/faqs/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/faqs')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View FAQ</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Review
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/reviewimages/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Review Image</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/reviewvideos/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Review Video</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/orders')}}" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                   Orders
                </p>
                <span class="badge badge-warning navbar-badge">{{Order::all()->count()}}</span>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
$(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
</script>