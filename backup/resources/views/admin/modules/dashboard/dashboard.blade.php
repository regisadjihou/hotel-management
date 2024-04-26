@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/libs/apexcharts/dist/apexcharts.css')}}">
    <link href="{{asset('assets/extra-libs/css-chart/css-chart.css')}}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{asset('assets/libs/jvectormap/jquery-jvectormap.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid">
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col pr-0 align-self-center">
                        <h2 class="fw-light mb-0">324</h2>
                        <h6 class="text-muted">New Clients</h6>
                    </div>
                    <!-- Column -->
                    <div class="col text-end align-self-center">
                        <div data-label="20%" class="css-bar mb-0 css-bar-info css-bar-20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col pr-0 align-self-center">
                        <h2 class="fw-light mb-0">2376</h2>
                        <h6 class="text-muted">Total Visits</h6>
                    </div>
                    <!-- Column -->
                    <div class="col text-end align-self-center">
                        <div data-label="30%" class="css-bar mb-0 css-bar-success css-bar-20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col pr-0 align-self-center">
                        <h2 class="fw-light mb-0">1795</h2>
                        <h6 class="text-muted">New Leads</h6>
                    </div>
                    <!-- Column -->
                    <div class="col text-end ">
                        <div data-label="40%" class="css-bar mb-0 css-bar-primary css-bar-40"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col pr-0 align-self-center">
                        <h2 class="fw-light mb-0">36870</h2>
                        <h6 class="text-muted">Page Views</h6>
                    </div>
                    <!-- Column -->
                    <div class="col text-end align-self-center">
                        <div data-label="60%" class="css-bar mb-0 css-bar-danger css-bar-60"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales Overview</h4>
                    <h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6>
                    <div id="sales-overview"></div>
                    <div class="text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item px-2">
                                <h6 class="text-success"><i class="fa fa-circle font-10 me-2 "></i>Ample
                                </h6>
                            </li>
                            <li class="list-inline-item px-2">
                                <h6 class=" text-info"><i class="fa fa-circle font-10 me-2"></i>Pixel</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Newsletter Campaign</h4>
                    <h6 class="card-subtitle">Overview of Newsletter Campaign</h6>
                    <div id="newsletter-campaign"></div>
                    <div class="text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item px-2">
                                <h6 class="text-success"><i class="fa fa-circle font-10 me-2 "></i>Open Rate
                                </h6>
                            </li>
                            <li class="list-inline-item px-2">
                                <h6 class="text-info"><i class="fa fa-circle font-10 me-2"></i>Recurring
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Current Visitors</h4>
                    <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                    <div id="usa" style="height: 300px"></div>
                    <div class="text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item px-2">
                                <h6 class="text-success"><i class="fa fa-circle font-10 me-2 "></i>Valley
                                </h6>
                            </li>
                            <li class="list-inline-item px-2">
                                <h6 class="text-info"><i class="fa fa-circle font-10 me-2"></i>Newyork
                                </h6>
                            </li>
                            <li class="list-inline-item px-2">
                                <h6 class="text-danger"><i class="fa fa-circle font-10 me-2"></i>Kansas
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-md-flex no-block">
                        <h4 class="card-title">Projects of the Month</h4>
                        <div class="ms-auto">
                            <select class="form-select">
                                <option selected="">January</option>
                                <option value="1">February</option>
                                <option value="2">March</option>
                                <option value="3">April</option>
                            </select>
                        </div>
                    </div>
                    <div class="month-table">
                        <div class="table-responsive mt-3">
                            <table class="table stylish-table v-middle mb-0 no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-muted fw-normal" colspan="2">Assigned</th>
                                        <th class="border-0 text-muted fw-normal">Name</th>
                                        <th class="border-0 text-muted fw-normal">Priority</th>
                                        <th class="border-0 text-muted fw-normal">Budget</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:50px;"><span
                                                class="round text-white d-inline-block text-center rounded-circle bg-info">S</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0">Sunil Joshi</h6><small class="text-muted">Web
                                                Designer</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td><span class="badge bg-success px-2 py-1">Low</span></td>
                                        <td>$3.9K</td>
                                    </tr>
                                    <tr class="active">
                                        <td><span class="round text-white d-inline-block text-center rounded-circle bg-info"><img
                                                    src="{{asset('assets/images/users/2.jpg')}}" alt="user" class="rounded-circle"
                                                    width="50"></span></td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0">Andrew</h6><small class="text-muted">Project Manager</small>
                                        </td>
                                        <td>Real Homes</td>
                                        <td><span class="badge bg-info px-2 py-1">Medium</span></td>
                                        <td>$23.9K</td>
                                    </tr>
                                    <tr>
                                        <td><span
                                                class="round text-white d-inline-block text-center rounded-circle bg-success">B</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0">Bhavesh patel</h6><small
                                                class="text-muted">Developer</small>
                                        </td>
                                        <td>MedicalPro Theme</td>
                                        <td><span class="badge bg-primary px-2 py-1">High</span></td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td><span
                                                class="round text-white d-inline-block text-center rounded-circle bg-primary">N</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0">Nirav Joshi</h6><small class="text-muted">Frontend
                                                Eng</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td><span class="badge bg-danger px-2 py-1">Low</span></td>
                                        <td>$10.9K</td>
                                    </tr>
                                    <tr>
                                        <td><span
                                                class="round text-white d-inline-block text-center rounded-circle bg-warning">M</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0">Micheal Doe</h6><small class="text-muted">Content
                                                Writer</small>
                                        </td>
                                        <td>Helping Hands</td>
                                        <td><span class="badge bg-warning px-2 py-1">High</span></td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td><span
                                                class="round text-white d-inline-block text-center rounded-circle bg-danger">N</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0">Johnathan</h6><small class="text-muted">Graphic</small>
                                        </td>
                                        <td>Digital Agency</td>
                                        <td><span class="badge bg-info px-2 py-1">High</span></td>
                                        <td>$2.6K</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-stretch">
            <!-- Column -->
            <div class="card w-100">
                <img class="card-img-top w-100 profile-bg-height"
                    src="{{asset('assets/images/background/profile-bg.jpg')}}" alt="Card image cap">
                <div class="card-body little-profile text-center">
                    <div class="pro-img"><img src="{{asset('assets/images/users/4.jpg')}}" alt="user"
                            class="rounded-circle shadow-sm" width="128" /></div>
                    <h3 class="mb-0">Angela Dominic</h3>
                    <p>Web Designer &amp; Developer</p>
                    <p><small>Lorem ipsum dolor sit amet, this is a consectetur adipisicing elit orem ipsum dolor sit amet, this is a consectetur adipisicing</small></p>
                    <a href="javascript:void(0)"
                        class="mt-1 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a>
                    <div class="row text-center mt-3 justify-content-center">
                        <div class="col-6 col-md-4 mt-3">
                            <h3 class="mb-0 fw-light">1099</h3><small class="text-muted">Articles</small>
                        </div>
                        <div class="col-6 col-md-4 mt-3">
                            <h3 class="mb-0 fw-light">23,469</h3><small class="text-muted">Followers</small>
                        </div>
                        <div class="col-6 col-md-4 mt-3">
                            <h3 class="mb-0 fw-light">6035</h3><small class="text-muted">Following</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
            <div class="w-100">
                <!-- card -->
                <div class="card bg-primary w-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="me-3 align-self-center">
                                <h1 class="text-white"><i class="ti-pie-chart"></i></h1>
                            </div>
                            <div>
                                <h3 class="card-title text-white">Bandwidth usage</h3>
                                <h6 class="card-subtitle text-white op-5">March 2020</h6>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4 col-xl-7 align-self-center">
                                <h2 class="fw-light text-white text-nowrap">50 GB</h2>
                            </div>
                            <div class="col-8 col-xl-5 pt-1 pb-2 align-self-center">
                                <div id="bandwidth-usage"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="card bg-success w-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="me-3 align-self-center">
                                <h1 class="text-white"><i class="icon-cloud-download"></i></h1>
                            </div>
                            <div>
                                <h3 class="card-title text-white">Download count</h3>
                                <h6 class="card-subtitle text-white op-5">March 2020</h6>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4 col-xl-6 align-self-center">
                                <h2 class="fw-light text-white text-nowrap text-truncate">35487</h2>
                            </div>
                            <div class="col-8 col-xl-6 pt-1 pb-2 text-end">
                                <div id="download-count"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h4 class="card-title">Feeds</h4>
                    <h6 class="card-subtitle mb-0">show new feeds</h6>
                </div>
                <div >
                    <ul class="feeds ps-0">
                        <div class="feed-item mb-2  py-2 pe-3 ps-4">
                            <div class="border-start border-2 border-info d-md-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                        class="ms-3 btn btn-light-info text-info btn-circle fs-5 d-flex align-items-center justify-content-center flex-shrink-0"><i
                                            data-feather="bell" class="feather-sm"></i></a>
                                    <div class="ms-3 text-truncate">
                                        <span class="text-dark font-weight-medium">You have 4 pending tasks.</span>
                                    </div>
                                </div>
                                <div class="justify-content-end text-truncate ms-5 ms-md-auto ps-4 ps-md-0">
                                    <span class="fs-2 text-muted">Just Now</span>
                                </div>
                            </div>
                        </div>
                        <div class="feed-item mb-2  py-2 pe-3 ps-4">
                            <div class="border-start border-2 border-success d-md-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                        class="ms-3 btn btn-light-success text-success btn-circle fs-5  d-flex align-items-center justify-content-center flex-shrink-0"><i
                                            data-feather="database" class="feather-sm"></i></a>
                                    <div class="ms-3 text-truncate">
                                        <span class="text-dark font-weight-medium">Server #1 overloaded</span>
                                    </div>
                                </div>
                                <div class="justify-content-end text-truncate ms-5 ms-md-auto ps-4 ps-md-0">
                                    <span class="fs-2 text-muted">2 Hours ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="feed-item mb-2  py-2 pe-3 ps-4">
                            <div class="border-start border-2 border-warning d-md-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                        class="ms-3 btn btn-light-warning text-warning btn-circle fs-5 d-flex align-items-center justify-content-center flex-shrink-0"><i
                                            data-feather="shopping-cart" class="feather-sm"></i></a>
                                    <div class="ms-3 text-truncate">
                                        <span class="text-dark font-weight-medium">New order received.</span>
                                    </div>
                                </div>
                                <div class="justify-content-end text-truncate ms-5 ms-md-auto ps-4 ps-md-0">
                                    <span class="fs-2 text-muted">31 May</span>
                                </div>
                            </div>
                        </div>
                        <div class="feed-item mb-2  py-2 pe-3 ps-4">
                            <div class="border-start border-2 border-danger d-md-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                        class="ms-3 btn btn-light-danger text-danger btn-circle fs-5 d-flex align-items-center justify-content-center flex-shrink-0"><i
                                            data-feather="users" class="feather-sm"></i></a>
                                    <div class="ms-3 text-truncate">
                                        <span class="text-dark font-weight-medium">New user registered.</span>
                                    </div>
                                </div>
                                <div class="justify-content-end text-truncate ms-5 ms-md-auto ps-4 ps-md-0">
                                    <span class="fs-2 text-muted">30 May</span>
                                </div>
                            </div>
                        </div>
                        <div class="feed-item mb-2  py-2 pe-3 ps-4">
                            <div class="border-start border-2 border-primary d-md-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                        class="ms-3 btn btn-light-primary text-primary btn-circle fs-5 d-flex align-items-center justify-content-center flex-shrink-0">
                                            <i data-feather="users" class="feather-sm"></i>
                                        </a>
                                    <div class="ms-3 text-truncate">
                                        <span class="text-dark font-weight-medium">New Version just arrived.</span>
                                    </div>
                                </div>
                                <div class="justify-content-end text-truncate ms-5 ms-md-auto ps-4 ps-md-0">
                                    <span class="fs-2 text-muted">27 May</span>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body bg-info rounded-top">
                    <h4 class="text-white card-title">My Contacts</h4>
                    <h6 class="card-subtitle text-white mb-0 op-5">Checkout my contacts here</h6>
                </div>
                <div class="card-body p-2">
                    <div class="message-box contact-box position-relative mt-2">
                        <div class="message-widget contact-widget scrollable" style="height: 305px;">
                            <!-- contact -->
                            <a href="#"  class="p-3 d-flex align-items-start rounded-3">
                                <div class="user-img position-relative d-inline-block me-2"> <img
                                        src="{{asset('assets/images/users/1.jpg')}}" alt="user"
                                        class="rounded-circle w-100">
                                    <span
                                        class="profile-status pull-right d-inline-block position-absolute bg-success rounded-circle"></span>
                                </div>
                                <div class="ps-2 v-middle d-md-flex align-items-center w-100">
                                    <div>
                                        <h5 class="my-1 text-dark font-weight-medium">James Smith</h5>
                                        <span class="text-muted fs-2">you were in video call</span>
                                        <span class="text-muted fs-2 d-block">45 mins ago</span>
                                    </div>
                                    <div class="ms-auto d-flex button-group mt-3 mt-md-0">
                                        <button type="button" href="#" class="btn btn-sm btn-light-danger text-danger">
                                            <i data-feather="video" class="feather-sm"></i>
                                        </button>
                                        <button type="button" href="#" class="btn btn-sm btn-light-primary text-primary">
                                            <i data-feather="phone-incoming" class="feather-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                            <!-- contact -->
                            <a href="#"  class="p-3 d-flex align-items-start rounded-3">
                                <div class="user-img position-relative d-inline-block me-2"> <img
                                        src="{{asset('assets/images/users/2.jpg')}}" alt="user"
                                        class="rounded-circle w-100">
                                    <span
                                        class="profile-status pull-right d-inline-block position-absolute bg-success rounded-circle"></span>
                                </div>
                                <div class="ps-2 v-middle d-md-flex align-items-center w-100">
                                    <div>
                                        <h5 class="my-1 text-dark font-weight-medium">Joseph Garciar</h5>
                                        <span class="text-muted fs-2">you were in video call</span>
                                        <span class="text-muted fs-2 d-block">2 mins ago</span>
                                    </div>
                                    <div class="ms-auto d-flex button-group mt-3 mt-md-0">
                                        <button type="button" href="#" class="btn btn-sm btn-light-danger text-danger">
                                            <i data-feather="video" class="feather-sm"></i>
                                        </button>
                                        <button type="button" href="#" class="btn btn-sm btn-light-success text-success">
                                            <i data-feather="phone-outgoing" class="feather-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                            <!-- contact -->
                            <a href="#"  class="p-3 d-flex align-items-start rounded-3">
                                <div class="user-img position-relative d-inline-block me-2"> <img
                                        src="{{asset('assets/images/users/6.jpg')}}" alt="user"
                                        class="rounded-circle w-100">
                                    <span
                                        class="profile-status pull-right d-inline-block position-absolute bg-success rounded-circle"></span>
                                </div>
                                <div class="ps-2 v-middle d-md-flex align-items-center w-100">
                                    <div>
                                        <h5 class="my-1 text-dark font-weight-medium">Maria Rodriguez</h5>
                                        <span class="text-muted fs-2">you missed john call</span>
                                        <span class="text-muted fs-2 d-block">1 hour ago</span>
                                    </div>
                                    <div class="ms-auto d-flex button-group mt-3 mt-md-0">
                                        <button type="button" href="#" class="btn btn-sm btn-light-danger text-danger">
                                            <i data-feather="video" class="feather-sm"></i>
                                        </button>
                                        <button type="button" href="#" class="btn btn-sm btn-light-info text-info">
                                            <i data-feather="phone-missed" class="feather-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                            <!-- contact -->
                            <a href="#"  class="p-3 d-flex align-items-start rounded-3">
                                <div class="user-img position-relative d-inline-block me-2"> <img
                                        src="{{asset('assets/images/users/4.jpg')}}" alt="user"
                                        class="rounded-circle w-100">
                                    <span
                                        class="profile-status pull-right d-inline-block position-absolute bg-success rounded-circle"></span>
                                </div>
                                <div class="ps-2 v-middle d-md-flex align-items-center w-100">
                                    <div>
                                        <h5 class="my-1 text-dark font-weight-medium">Henry Johnson</h5>
                                        <span class="text-muted fs-2">you were in phone call</span>
                                        <span class="text-muted fs-2 d-block">2 days ago</span>
                                    </div>
                                    <div class="ms-auto d-flex button-group mt-3 mt-md-0">
                                        <button type="button" href="#" class="btn btn-sm btn-light-danger text-danger">
                                            <i data-feather="video" class="feather-sm"></i>
                                        </button>
                                        <button type="button" href="#" class="btn btn-sm btn-light-success text-success">
                                            <i data-feather="phone-outgoing" class="feather-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                            <!-- contact -->
                            <a href="#"  class="p-3 d-flex align-items-start rounded-3">
                                <div class="user-img position-relative d-inline-block me-2"> <img
                                        src="{{asset('assets/images/users/5.jpg')}}" alt="user"
                                        class="rounded-circle w-100">
                                    <span
                                        class="profile-status pull-right d-inline-block position-absolute bg-success rounded-circle"></span>
                                </div>
                                <div class="ps-2 v-middle d-md-flex align-items-center w-100">
                                    <div>
                                        <h5 class="my-1 text-dark font-weight-medium">James Johnson</h5>
                                        <span class="text-muted fs-2">call forwarded</span>
                                        <span class="text-muted fs-2 d-block">55 mins ago</span>
                                    </div>
                                    <div class="ms-auto d-flex button-group mt-3 mt-md-0">
                                        <button type="button" href="#" class="btn btn-sm btn-light-danger text-danger">
                                            <i data-feather="video" class="feather-sm"></i>
                                        </button>
                                        <button type="button" href="#" class="btn btn-sm btn-light-warning text-warning">
                                            <i data-feather="phone-forwarded" class="feather-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body pb-0">
                    <h4 class="card-title">Recent Comments</h4>
                    <h6 class="card-subtitle mb-3 pb-1">Latest Comments on users from Material</h6>
                </div>
                <!-- ============================================================== -->
                <!-- Comment widgets -->
                <!-- ============================================================== -->
                <div class="comment-widgets scrollable mb-2 common-widget" style="height: 450px;">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row p-3">
                        <div class="p-2"><span
                                class="round text-white d-inline-block text-center bg-info"><img
                                    src="{{asset('assets/images/users/1.jpg')}}" class="rounded-circle" alt="user" width="50"></span></div>
                        <div class="comment-text w-100 p-3">
                            <h5 class="text-nowrap font-weight-medium">James Anderson</h5>
                            <p class="mb-1 fs-3 fw-normal text-muted">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry. </p>
                            <div class="comment-footer d-md-flex align-items-center mt-2">
                                <span class="badge bg-light-info text-info font-weight-medium py-1">Pending</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)" class="ps-3"><i
                                            class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)" class="ps-3"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)" class="ps-3"><i class="ti-heart"></i></a>
                                </span>
                                <div class="ms-auto">
                                    <span class="text-muted fs-2">April 14, 2021</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row active p-3">
                        <div class="p-2"><span
                                class="round text-white d-inline-block text-center bg-info"><img
                                    src="{{asset('assets/images/users/2.jpg')}}" class="rounded-circle" alt="user" width="50"></span></div>
                        <div class="comment-text active w-100 p-3">
                            <h5 class="text-nowrap font-weight-medium">Michael Jorden</h5>
                            <p class="mb-1 fs-3 text-muted fw-normal">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry.</p>
                                <div class="comment-footer d-md-flex align-items-center mt-2">
                                    <span class="badge bg-light-success text-success font-weight-medium py-1">Approved</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)" class="ps-3"><i
                                                class="ti-pencil-alt"></i></a>
                                        <a href="javascript:void(0)" class="ps-3"><i class="ti-check"></i></a>
                                        <a href="javascript:void(0)" class="ps-3"><i class="ti-heart"></i></a>
                                    </span>
                                    <div class="ms-auto">
                                        <span class="text-muted fs-2">April 14, 2021</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row p-3">
                        <div class="p-2"><span
                                class="round text-white d-inline-block text-center bg-info"><img
                                    src="{{asset('assets/images/users/3.jpg')}}" class="rounded-circle" alt="user" width="50"></span></div>
                        <div class="comment-text w-100 p-3">
                            <h5 class="text-nowrap font-weight-medium">Johnathan Doeting</h5>
                            <p class="mb-1 fs-3 fw-normal text-muted">Lorem Ipsum is simply dummy text of the printing
                                and type
                                setting industry.</p>
                            <div class="comment-footer d-md-flex align-items-center mt-2">
                                <span class="badge bg-light-danger text-danger font-weight-medium py-1">Rejected</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)" class="ps-3"><i
                                            class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)" class="ps-3"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)" class="ps-3"><i class="ti-heart"></i></a>
                                </span>
                                <div class="ms-auto">
                                    <span class="text-muted fs-2">April 14, 2021</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row p-3">
                        <div class="p-2"><span
                                class="round text-white d-inline-block text-center bg-info"><img
                                    src="{{asset('assets/images/users/4.jpg')}}" class="rounded-circle" alt="user" width="50"></span></div>
                        <div class="comment-text w-100 p-3">
                            <h5 class="text-nowrap font-weight-medium">James Anderson</h5>
                            <p class="mb-1 fs-3 text-muted fw-normal">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry.</p>
                            <div class="comment-footer d-md-flex align-items-center mt-2">
                                <span class="badge bg-light-info text-info font-weight-medium py-1">Pending</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)" class="ps-3"><i
                                            class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)" class="ps-3"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)" class="ps-3"><i class="ti-heart"></i></a>
                                </span>
                                <div class="ms-auto">
                                    <span class="text-muted fs-2">April 14, 2021</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title">To Do list</h4>
                            <h6 class="card-subtitle mb-0">List of your next task to complete</h6>
                        </div>
                        <button class="ms-auto btn btn-sm btn-rounded btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Add Task</button>
                    </div>

                    <!-- -------------------------------------------------------------- -->
                    <!-- To do list widgets -->
                    <!-- -------------------------------------------------------------- -->
                    <div class="to-do-widget mt-3 common-widget scrollable" style="height: 443px;">
                        <!-- .modal for add task -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex">
                                        <h4 class="modal-title">Add Task</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label>Task name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Task Name"> </div>
                                            <div class="mb-3">
                                                <label>Assign to</label>
                                                <select
                                                    class="form-select">
                                                    <option selected="">Sachin</option>
                                                    <option value="1">Sehwag</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success"
                                            data-bs-dismiss="modal">Submit</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                            <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0"
                                data-role="task">
                                <div class="form-check form-check-inline w-100">
                                    <input type="checkbox" class="form-check-input danger check-light-danger"
                                        id="inputSchedule" name="inputCheckboxesSchedule">
                                    <label for="inputSchedule" class="form-check-label font-weight-medium"> <span>Schedule meeting
                                            with</span><span
                                            class="badge bg-danger badge-pill ms-1">Today</span>
                                    </label>
                                </div>
                                <ul class="assignedto list-style-none m-0 ps-4 ms-1 mt-1">
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/1.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Steave" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/2.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Jessica" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/3.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Priyanka" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/4.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Selina" class="rounded-circle">
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0"
                                data-role="task">
                                <div class="form-check form-check-inline w-100">
                                    <input type="checkbox" id="inputCall" class="form-check-input info check-light-info"
                                        name="inputCheckboxesCall">
                                    <label for="inputCall" class="form-check-label font-weight-medium"> <span>Give Purchase report
                                            to</span>
                                        <span
                                            class="badge bg-info badge-pill ms-1">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="assignedto m-0 ps-4 ms-1 mt-1">
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/3.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Priyanka" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/4.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Selina" class="rounded-circle">
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0"
                                data-role="task">
                                <div class="form-check form-check-inline w-100">
                                    <input type="checkbox" id="inputBook" class="form-check-input primary check-light-primary"
                                        name="inputCheckboxesBook">
                                    <label for="inputBook" class="form-check-label font-weight-medium"> <span>Book flight for
                                            holiday</span><span
                                            class="badge bg-primary badge-pill ms-1">1
                                            week</span>
                                    </label>
                                </div>
                                <div class="fs-2 ps-3 d-inline-block ms-2"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0"
                                data-role="task">
                                <div class="form-check form-check-inline w-100">
                                    <input type="checkbox" id="inputForward" class="form-check-input warning check-light-warning"
                                        name="inputCheckboxesForward">
                                    <label for="inputForward" class="form-check-label font-weight-medium"> <span>Forward all
                                            tasks</span> <span
                                            class="badge bg-warning badge-pill ms-1">2
                                            weeks</span> </label>
                                </div>
                                <div class="fs-2 ps-3 d-inline-block ms-2"> 26 jun 2021</div>
                            </li>
                            <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0"
                                data-role="task">
                                <div class="form-check form-check-inline w-100">
                                    <input type="checkbox" id="inputRecieve" class="form-check-input success check-light-success"
                                        name="inputCheckboxesRecieve">
                                    <label for="inputRecieve" class="form-check-label font-weight-medium"> <span>Recieve
                                            shipment</span><span
                                            class="badge bg-success badge-pill ms-1">2
                                            weeks</span>
                                    </label>
                                </div>
                                <ul class="assignedto list-style-none m-0 ps-4 ms-1 mt-1">
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/1.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Steave" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/2.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Jessica" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/3.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Priyanka" class="rounded-circle">
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0"
                                data-role="task">
                                <div class="form-check form-check-inline w-100">
                                    <input type="checkbox" class="form-check-input danger check-light-danger"
                                        id="inputSchedule" name="inputCheckboxesSchedule">
                                    <label for="inputSchedule" class="form-check-label font-weight-medium"> <span>Schedule meeting
                                            with</span><span
                                            class="badge bg-danger badge-pill ms-1">Today</span>
                                    </label>
                                </div>
                                <ul class="assignedto list-style-none m-0 ps-4 ms-1 mt-1">
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/1.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Steave" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/2.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Jessica" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/3.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Priyanka" class="rounded-circle">
                                    </li>
                                    <li class="d-inline-block border-0 me-1"><img
                                            src="{{asset('assets/images/users/4.jpg')}}" alt="user"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Selina" class="rounded-circle">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('assets/libs/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('dist/js/pages/dashboards/dashboard3.js')}}"></script>
@endsection
