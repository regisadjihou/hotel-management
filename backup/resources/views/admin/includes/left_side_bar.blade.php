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
                        <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Markarn Doe</a>
                        <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"><i data-feather="user" class="feather-sm text-info me-1 ms-1"></i> My
                                    Profile</a>
                                <a class="dropdown-item" href="#"><i data-feather="credit-card" class="feather-sm text-info me-1 ms-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="#"><i data-feather="mail" class="feather-sm text-success me-1 ms-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="settings" class="feather-sm text-warning me-1 ms-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="authentication-login3.html"><i data-feather="log-out"
                                        class="feather-sm text-danger me-1 ms-1"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-2"><a href="#"
                                        class="btn d-block w-100 btn-info rounded-pill">View Profile</a></div>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('dashboard')}}" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> Dashboard </span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Products</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('admin.product.index')}}" class="sidebar-link{{ request()->routeIs('admin.product.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Product List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                <a href="{{ route('admin.product.create') }}" class="sidebar-link{{ request()->routeIs('admin.product.create') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Product Insert </span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Other Products</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('admin.product.shoes.index')}}" class="sidebar-link{{ request()->routeIs('admin.product.shoes.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Shoes List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                <a href="{{ route('admin.product.shoes.create') }}" class="sidebar-link{{ request()->routeIs('admin.product.shoes.create') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Shoes Insert </span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        {{-- orders --}}
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Order Menus</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Orders</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('admin.order.index')}}" class="sidebar-link{{ request()->routeIs('admin.order.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Order List</span>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Miscellaneous Menus</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Miscellaneous</span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{route('admin.league.index')}}" class="sidebar-link{{ request()->routeIs('admin.league.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Leagues</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.league-team.index')}}" class="sidebar-link{{ request()->routeIs('admin.league-team.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Leagues Teams</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.country.index')}}" class="sidebar-link{{ request()->routeIs('admin.country.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Countries</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.country-team.index')}}" class="sidebar-link{{ request()->routeIs('admin.country-team.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Countries Teams</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.category.index')}}" class="sidebar-link{{ request()->routeIs('admin.category.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Categories</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('admin.subcategory.index')}}" class="sidebar-link{{ request()->routeIs('admin.subcategory.index') ? ' active' : '' }}">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Sub Categories</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->
                <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
