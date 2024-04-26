<!DOCTYPE html>
<html dir="ltr" lang="en">

    @include('admin.includes.head')

<body>
    @include('admin.includes.pre_loader')
    <div id="main-wrapper">
        @include('admin.includes.top_bar')
        @include('admin.includes.left_side_bar')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
   @include('admin.includes.scripts')
</body>

</html>
