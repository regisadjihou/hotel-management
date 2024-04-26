@extends('frontend.layouts.master')


@section('content')


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">

                <div class="row g-4">
                    @php
                    $staff = \App\Models\User::where('type','staff')->get();
                @endphp
                <!-- Team Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                            <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
                        </div>
                        <div class="row g-4">
                            @foreach($staff as $s)
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="rounded shadow overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="{{ asset('user_images/' . $s->image) }}" alt="">

                                    </div>
                                    <div class="text-center p-4 mt-3">
                                        <h5 class="fw-bold mb-0">{{$s->name}}</h5>
                                        <small>{{$s->position}}</small>
                                    </div>
                                </div>
                            </div>
                          @endforeach

                        </div>
                    </div>
                </div>
                <!-- Team End -->
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->

@endsection
