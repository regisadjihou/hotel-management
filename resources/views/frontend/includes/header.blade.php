 <!-- Header Start -->
 <div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{route('home')}}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h3 class="m-0 text-primary text-uppercase">Omega Sky Hotel</h3>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">info@omegaskyhotelky.com</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">+1 (859) 123-4567</p>
                    </div>
                </div>

            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="{{route('home')}}" class="navbar-brand d-block d-lg-none">
                    <h3 class="m-0 text-primary text-uppercase">Omega Sky Hotel</h3>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                        <a href="{{route('service')}}" class="nav-item nav-link">Services</a>
                        <a href="{{route('room')}}" class="nav-item nav-link">Rooms</a>
                        <a href="{{route('team')}}" class="nav-item nav-link">Our Team</a>
                        <a href="{{route('testimonial')}}" class="nav-item nav-link">Testimonial</a>

                        <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                        @if(Auth::user() && Auth::user()->type == "user")
                        <a href="{{route('user.dashboard')}}" class="nav-item nav-link">Dashboard</a>
                        @else
                        <a href="{{route('user.register.page')}}" class="nav-item nav-link">Register</a>
                        <a href="{{route('user.login.page')}}" class="nav-item nav-link">Login</a>
                        @endif
                    </div>

                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->
