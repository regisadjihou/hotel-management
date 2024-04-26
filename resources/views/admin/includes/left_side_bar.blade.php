<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile position-relative" style="background: url({{asset('assets/images/background/user-info.jpg')}}) no-repeat;">
                    <!-- User profile image -->
                    <!-- User profile text-->
                    <div class="profile-text dropdown">
                        <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuLink">

                                <div class="dropdown-divider"></div>
                                @if(Auth::user()->type == "staff")
                                <a class="dropdown-item" href="{{route('logout')}}"><i data-feather="log-out"
                                        class="feather-sm text-danger me-1 ms-1"></i> Logout</a>
                                @else
                                <a class="dropdown-item" href="{{route('user-logout')}}"><i data-feather="log-out"
                                    class="feather-sm text-danger me-1 ms-1"></i> Logout</a>
                                @endif
                                <div class="dropdown-divider"></div>

                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @if(Auth::user()->type == "staff")
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.dashboard')}}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Dashboard </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('bookings')}}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Bookings </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Rooms</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('admin.rooms.index')}}" class="sidebar-link{{ request()->routeIs('admin.rooms.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Rooms List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                <a href="{{ route('admin.rooms.create') }}" class="sidebar-link{{ request()->routeIs('admin.rooms.create') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Room Insert </span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('admin.users.index',['type' => 'staff'])}}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Staff</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.users.index',['type' => 'user'])}}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Users</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        @elseif(Auth::user()->type == "user")
                        <li class="sidebar-item">
                            <a href="{{route('user.dashboard')}}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Dashboard </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('user.bookings')}}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu">My Bookings </span>
                            </a>
                        </li>

                        @endif


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->

        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
