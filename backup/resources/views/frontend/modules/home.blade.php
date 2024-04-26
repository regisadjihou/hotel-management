@extends('frontend.layouts.master')

@section('styles')
<style>
.feature__thum{
    text-align:center;
}
.feature-single-item .feature__thum img {
    height: 120px;
    width:auto;
}
.feature-single-item:hover::after {
    opacity: 0;
    visibility: visible;
}
</style>


@endsection
@section('content')
<!-- slider area start -->
<div class="slider-area">
    <div class="hero-slider-active hero__2 slick-arrow-style">
        <div class="single-slider d-flex align-items-center" style="background-image: url({{asset('frontend/assets/img/slider/home-slider.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider-text slider-style-2">
                            <h4>Ski & Snowboard Sale</h4>
                            <h1>Save Up To 20% Off</h1>
                            <p>On skis, boards, boots, bindings, outerwear, footwear and more!</p>
                            <a class="home-btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider d-flex align-items-center" style="background-image: url({{asset('frontend/assets/img/slider/home-slider2.jpeg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider-text slider-style-2">
                            <h4>the latest</h4>
                            <h1>sky race kit 2018</h1>
                            <p>from your favorite brands in stores from 1st september 2018</p>
                            <a class="home-btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider area end -->

<!-- features item area start -->
<div class="features-item-area pt-100 pt-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title text-center mb-30">
                    <h2>Top <span>Teams</span></h2>

                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/manchesterunited.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/manchestercity.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/psg.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/lfc.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/acm.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/chelsea.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
        </div>
        <div class="row " style="padding-top:50px;">
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/fcbarcelona.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/fcbm.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/intermilan.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/tottenham.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/miami.jpg')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
            <div class="col-lg-2 col-md-2">
                <div class="feature-single-item hm-2">
                    <div class="feature__img">
                        <div class="feature__thum">
                            <img src="{{asset('frontend/assets/img/team/fcbm.png')}}" alt="">
                        </div>

                    </div>
                </div> <!-- features single item end -->
            </div> <!-- features single column end -->
        </div>
    </div>
</div>
<!-- features item area end -->

<!-- our product area start -->
<div class="section-wrapper pt-96 pb-43 pt-sm-20 pb-sm-17">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title text-center mb-30">
                    <h2>List Of <span>Leagues</span></h2>
                    <p>Below are the lists of All the Leagues</p>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            <div class="col-12">
                <div class="product-tab d-flex justify-content-center mb-45">
                    <ul class="nav d-flex justify-content-center">
                        <li>
                            <a class="active" data-bs-toggle="tab" href="#tab_one">Champions League</a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#tab_two">The Premier League</a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#tab_three">The League</a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#tab_four">A League</a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#tab_five">Ligue 1</a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#tab_six">Bundesliga</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab_one">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/premier-league.jpg')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/bundesliga.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/laliga.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/ligue-1.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/serie-a.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_two">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/arsenal.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/astinvilla.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/chelsea.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/everton.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/leicester.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/lfc.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->

                        </div>
                        <div class="row justify-content-center" style="margin-top:50px;">

                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/tottenham.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/nottingham.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/lufc.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/manchesterunited.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/manchestercity.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/newcastleunited.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_three">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/1.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/2.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/3.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/4.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/5.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/6.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->

                        </div>
                        <div class="row justify-content-center" style="margin-top:50px;">

                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/7.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/8.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/9.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/10.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/11.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/12.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_four">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/13.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/14.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/15.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/16.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                        </div>
                        <div class="row justify-content-center" style="margin-top:50px;">

                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/17.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/18.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/19.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/20.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->

                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_five">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/21.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/22.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/23.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/24.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->


                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_six">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/25.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/26.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/27.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/28.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->
                            <div class="col-lg-2 col-md-2">
                                <div class="feature-single-item hm-2">
                                    <div class="feature__img">
                                        <div class="feature__thum">
                                            <img src="{{asset('frontend/assets/img/team/29.png')}}" alt="">
                                        </div>

                                    </div>
                                </div> <!-- features single item end -->
                            </div> <!-- features single column end -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- our product area end -->

 <!-- product main wrapper start -->
 <div class="section-wrapper pt-68 pb-43 pt-sm-20 pb-sm-15">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title brand-color2 text-center mb-45">
                    <h2>new <span>products</span> </h2>
                    <p>Browse the collection of our new products and latest products. You will denfinitely find what you are looking for.</p>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="product-carousel-active brand-color2 slick-arrow-style2 row" data-row="2">
            @foreach($products as $product)
                @include('frontend.snippets.products')
            @endforeach
        </div>
    </div>
</div>
<!-- product main wrapper end -->

<!-- hot deals wrapper start -->
<div class="section-wrapper hot-deals-area pt-96 pt-sm-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title text-center mb-45">
                    <h2 class="white">hot <span>deals</span></h2>
                    <p class="white">The variety of product types, dozens of products are discounted on the day Browse the gallery right now.</p>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            <div class="col-12">
                <div class="hot_deals_carousel_active slick-arrow-style2">
                    <div class="product-details-carousel-item">
                        <div class="product__details_carousel_inner">
                            <div class="product__item">
                                <div class="product__thumb">
                                    <a class="img-overlay" href="product-details.html">
                                        <img class="pri-img" src="{{asset('frontend/assets/img/dummy-products/6.webp')}}" alt="">
                                        <img class="sec-img" src="{{asset('frontend/assets/img/dummy-products/6.webp')}}" alt="">
                                    </a>
                                </div>
                                <div class="discount-text">
                                    <h4>sale up to 70% off</h4>
                                </div>
                            </div>
                            <div class="product_detail_content_inner">
                                <h2><a href="product-details.html">turbo snowboard</a></h2>
                                <h6><a href="product-details.html">studio design</a></h6>
                                <div class="product__price__ratings mb-20">
                                    <div class="price__box">
                                        <span class="regular-price"><span class="special-price">£50.00</span></span>
                                        <span class="old-price"><del>£60.00</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                    </div>
                                </div>
                                <p class="mb-30">Effective MegaPixel: About 2MPModel Number: VPAI720Screen Size: NOHDMI Output: NoWaterproof: NoImage Stabilization: No Image StabilizationPackage: NoNightShot Function: NoVolume: 41x41x41mmThe Surround Sound Support: NoWideangle: 360°*360°Maximum Aperture: 210 degree wide angleBuilt-in</p>
                                <a href="#" class="add_btn"><i class="pe-7s-cart"></i> add to cart</a>
                                <div class="product-countdown" data-countdown="2024/12/16"></div>
                            </div>
                        </div>
                    </div> <!-- single carousel item end -->
                    <div class="product-details-carousel-item">
                        <div class="product__details_carousel_inner">
                            <div class="product__item">
                                <div class="product__thumb">
                                    <a class="img-overlay" href="product-details.html">
                                        <img class="pri-img" src="{{asset('frontend/assets/img/dummy-products/6.webp')}}" alt="">
                                        <img class="sec-img" src="{{asset('frontend/assets/img/dummy-products/6.webp')}}" alt="">
                                    </a>
                                </div>
                                <div class="discount-text">
                                    <h4>sale up to 70% off</h4>
                                </div>
                            </div>
                            <div class="product_detail_content_inner">
                                <h2><a href="product-details.html">turbo snowboard</a></h2>
                                <h6><a href="product-details.html">studio design</a></h6>
                                <div class="product__price__ratings mb-20">
                                    <div class="price__box">
                                        <span class="regular-price"><span class="special-price">£50.00</span></span>
                                        <span class="old-price"><del>£60.00</del></span>
                                    </div>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                    </div>
                                </div>
                                <p class="mb-30">Effective MegaPixel: About 2MPModel Number: VPAI720Screen Size: NOHDMI Output: NoWaterproof: NoImage Stabilization: No Image StabilizationPackage: NoNightShot Function: NoVolume: 41x41x41mmThe Surround Sound Support: NoWideangle: 360°*360°Maximum Aperture: 210 degree wide angleBuilt-in</p>
                                <a href="#" class="add_btn"><i class="pe-7s-cart"></i> add to cart</a>
                                <div class="product-countdown" data-countdown="2024/12/28"></div>
                            </div>
                        </div>
                    </div> <!-- single carousel item end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hot deals wrapper end -->



<!-- blog area start -->
<div class="section-wrapper blog-wrapper pt-100 pb-70 pb-lg-90 pt-md-125 pb-md-65 pt-sm-20 pb-sm-55">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="blog-section-title text-center text-md-start mb-30">
                    <h2>latest <span>blogs</span> </h2>
                    <p>Do you want to present posts in the best way to highlight interesting moments of your blog? Focus on the latest news!</p>
                </div>
                <div class="blog-content-wrapper">
                    <div class="blog-item-content mb-30">
                        <div class="blog-img-holder">
                            <a href="blog-details.html"><img src="{{asset('frontend/assets/img/blog/blog-1.jpg')}}" alt=""></a>
                        </div>
                        <div class="blog-item-content-inner">
                            <div class="blog-content-holder">
                                <h3><a href="blog-details.html">This is First Post For XipBlog</a></h3>
                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since</p>
                                <a class="read_more" href="blog-details.html">read more</a>
                            </div>
                        </div>
                    </div> <!-- single blog item end -->
                    <div class="blog-item-content mb-30">
                        <div class="blog-img-holder">
                                <a href="blog-details.html"><img src="{{asset('frontend/assets/img/blog/blog-2.jpg')}}" alt=""></a>
                        </div>
                        <div class="blog-item-content-inner">
                            <div class="blog-content-holder">
                                <h3><a href="blog-details.html">This is Fourth Post For XipBlog</a></h3>
                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since</p>
                                <a class="read_more" href="blog-details.html">read more</a>
                            </div>
                        </div>
                    </div> <!-- single blog item end -->
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="newsletter-area">
                    <div class="title-newsletter mb-20">
                        <h2>Join our newsletter to receive monthly incentives</h2>
                        <p>You can be always up to date with our company news!</p>
                    </div>
                    <form id="mc-form" >
                        <input type="email" id="mc-email" autocomplete="off" class="newsletter-field" placeholder="enter your email">
                        <button class="submit-btn" type="submit" id="mc-submit">subscribe !</button>
                        <p>*Don’t worry, we won’t spam our customers mailboxes</p>
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div><!-- mailchimp-alerts end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog area end -->

<!-- brand area start -->
<div class="section-wrapper brand-area pt-48 pb-48">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand-slider-active slick-arrow-style2">
                    <div class="single-brand text-center">
                        <a href="#"><img src="{{asset('frontend/assets/img/brand/brand-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="single-brand text-center">
                        <a href="#"><img src="{{asset('frontend/assets/img/brand/brand-2.jpg')}}" alt=""></a>
                    </div>
                    <div class="single-brand text-center">
                        <a href="#"><img src="{{asset('frontend/assets/img/brand/brand-3.jpg')}}" alt=""></a>
                    </div>
                    <div class="single-brand text-center">
                        <a href="#"><img src="{{asset('frontend/assets/img/brand/brand-4.jpg')}}" alt=""></a>
                    </div>
                    <div class="single-brand text-center">
                        <a href="#"><img src="{{asset('frontend/assets/img/brand/brand-5.jpg')}}" alt=""></a>
                    </div>
                    <div class="single-brand text-center">
                        <a href="#"><img src="{{asset('frontend/assets/img/brand/brand-6.jpg')}}" alt=""></a>
                    </div>
                    <div class="single-brand text-center">
                        <a href="#"><img src="{{asset('frontend/assets/img/brand/brand-7.jpg')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand area end -->
<!-- Quick view modal start -->
<div class="modal fade" id="quick_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product-large-slider mb-20">
                            <div class="pro-large-img">
                                <img src="{{asset('frontend/assets/img/product/product-4.jpg')}}" alt="" />
                            </div>
                            <div class="pro-large-img">
                                <img src="{{asset('frontend/assets/img/product/product-5.jpg')}}" alt=""/>
                            </div>
                            <div class="pro-large-img">
                                <img src="{{asset('frontend/assets/img/product/product-6.jpg')}}" alt=""/>
                            </div>
                            <div class="pro-large-img">
                                <img src="{{asset('frontend/assets/img/product/product-7.jpg')}}" alt=""/>
                            </div>
                            <div class="pro-large-img">
                                <img src="{{asset('frontend/assets/img/product/product-8.jpg')}}" alt=""/>
                            </div>
                            <div class="pro-large-img">
                                <img src="{{asset('frontend/assets/img/product/product-9.jpg')}}" alt=""/>
                            </div>
                        </div>
                        <div class="pro-nav slick-arrow-style2 arrow3">
                            <div class="pro-nav-thumb"><img src="{{asset('frontend/assets/img/product/product-4.jpg')}}" alt="" /></div>
                            <div class="pro-nav-thumb"><img src="{{asset('frontend/assets/img/product/product-5.jpg')}}" alt="" /></div>
                            <div class="pro-nav-thumb"><img src="{{asset('frontend/assets/img/product/product-6.jpg')}}" alt="" /></div>
                            <div class="pro-nav-thumb"><img src="{{asset('frontend/assets/img/product/product-7.jpg')}}" alt="" /></div>
                            <div class="pro-nav-thumb"><img src="{{asset('frontend/assets/img/product/product-8.jpg')}}" alt="" /></div>
                            <div class="pro-nav-thumb"><img src="{{asset('frontend/assets/img/product/product-9.jpg')}}" alt="" /></div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product__details__content mb-30 mt-md-40 mt-sm-40">
                            <h2><a href="product-details.html">Giro Nine MIPS Helmet</a></h2>
                            <h6><a href="product-details.html">studio design</a></h6>
                            <div class="ratings mb-10">
                                <span class="good"><i class="fa fa-star"></i></span>
                                <span class="good"><i class="fa fa-star"></i></span>
                                <span class="good"><i class="fa fa-star"></i></span>
                                <span class="good"><i class="fa fa-star"></i></span>
                                <span class="good"><i class="fa fa-star"></i></span>
                            </div>
                            <div class="price-box">
                                <span class="regular-price">£50.00</span>
                                <span class="old-price"><del>£60.00</del></span>
                            </div>
                            <p class="mt-20 mb-20">other board in the K2 line-up pops harder or slashes heavier while offering the perfect balance of power and finesse.o</p>
                            <div class="action_link mb-20">
                                <a href="#" class="add_btn"><i class="pe-7s-cart"></i> add to cart</a>
                            </div>
                            <div class="quantity mb-20">
                                <h5>Quantity:</h5>
                                <div class="pro-qty"><input type="text" value="1"></div>
                            </div>
                            <div class="useful-links mb-20">
                                <a href="#"><i class="fa fa-heart-o"></i>add to wishlist</a>
                                <a href="#"><i class="fa fa-refresh"></i>compare product</a>
                            </div>
                            <div class="share-icon mb-20">
                                <h5>Share: </h5>
                                <a class="bg-facebook" href="#"><i class="fa fa-facebook"></i>share</a>
                                <a class="bg-twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                <a class="bg-google" href="#"><i class="fa fa-google-plus"></i>google +</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick view modal end -->
@endsection

@section('scripts')
@if(Session::has('cart_empty_error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: "{{Session::get('cart_empty_error')}}",
            showConfirmButton: true
        });
    </script>
@endif
@endsection

