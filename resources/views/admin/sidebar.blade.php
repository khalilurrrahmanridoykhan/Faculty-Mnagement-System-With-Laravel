<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-white" style="height: 57px;">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <img src="#" alt="" class="w-75 ml-3" style="margin-top:-20px">
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('admin.dashbord.index') }}" class="nav-link {{ Request::routeIs('admin.dashbord.index') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faculty.index') }}" class="nav-link {{ Request::routeIs('admin.faculty.index') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa-solid fa-microchip"></i> --}}
                        <i class="nav-icon fa-solid fa-chalkboard-user"></i>
                        <p>Manage Faculty</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.course.index') }}" class="nav-link {{ Request::routeIs('admin.course.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-book-open"></i>
                        <p>Manage Course</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.assignment.index') }}" class="course-assinment-box nav-link {{ Request::routeIs('admin.assignment.index') ? 'active' : '' }}">
                        <i class="course-assignment-icon nav-icon fa-solid fa-address-card"></i>
                        <p class="course-assignment-text">Course Assignment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.paralacourse.index') }}" class="nav-link {{ Request::routeIs('admin.paralacourse.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-inbox"></i>
                        <p>Manage Paralal Course</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.timeslot.index') }}" class="nav-link {{ Request::routeIs('admin.timeslot.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-calendar-days"></i>
                        <p>Time Slot</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.section.index') }}" class="nav-link {{ Request::routeIs('admin.section.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-users-rectangle nav-icon"></i>
                        <p>Manage Section</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.uniotherinfo.index') }}" class="nav-link {{ Request::routeIs('admin.uniotherinfo.index') ? 'active' : '' }}">
                        <i class="far fa-solid fa-hammer nav-icon"></i>
                        <p>Other Info</p>
                    </a>
                </li>


                <li onclick="submanuclick();" class="submanuclass nav-item">
                    {{-- <a href="{{ route('admin.logout') }}" class="nav-link {{ Request::routeIs('admin.setting.indexwithedit') ? 'active' : '' }}" >
                        <i class='fas fa-sign-out-alt nav-icon'></i>

                        <p>Logout</p>
                    </a> --}}

                    <form method="POST" action="{{ route('admin.logout') }}" class="nav-link">
                        @csrf
                        <i class='fas fa-sign-out-alt nav-icon'></i>

                        <a href="route('admin.logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">

                            <p>Logout</p>
                    </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    function submanuclick() {



    }
</script>
