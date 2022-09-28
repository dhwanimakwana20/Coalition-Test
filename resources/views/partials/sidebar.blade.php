<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin')}}" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('projects') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Add Projects
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tasks') }}" class="nav-link">
                    <i class="nav-icon fas fa-id-card-alt"></i>
                    <p>
                        Add Tasks
                    </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
