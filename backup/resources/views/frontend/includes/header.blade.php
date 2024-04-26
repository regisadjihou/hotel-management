@php
    $other_categories = \App\Models\Category::where('status',1)->where('type',2)->get();
    $leagues = \App\Models\League::where('status',1)->get();
    $countries = \App\Models\Country::where('status',1)->get();

@endphp
<!-- header area start -->
<header>
    <!-- start header menu -->
    <div class="header-menu-area sticker pl-35 pr-35 pl-lg-0 pr-lg-0 pl-xl-0 pr-xl-0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2 col-4">
                     <div class="brand-logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('frontend/assets/img/logo/logo.PNG')}}" alt="brand logo">
                        </a>
                     </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <div class="main-menu d-flex justify-content-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>

                                <li><a href="#">Leagues <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown">
                                        @foreach($leagues as $league)
                                        <li><a href="{{route('product-list-by-league',['id' => $league->id])}}">{{$league->title}} <i class="fa fa-angle-right"></i></a>
                                            <ul class="dropdown">
                                                @foreach($league->teams as $team)
                                                <li><a href="{{route('product-list-by-team',['id' => $team->id])}}">{{$team->name}}</a></li>
                                                @endforeach
                                            </ul>

                                        </li>
                                        @endforeach


                                    </ul>
                                </li>
                                <li><a href="#">National Teams <i class="fa fa-angle-down"></i></a>
                                    <ul class="megamenu" style="width: 1000px;left: -200%;">
                                        @foreach($countries as $country)
                                        <li class="mega-title" style="width:20%"><a href="#">{{$country->name}}</a>
                                            <ul>
                                                @foreach($country->teams as $team)
                                                <li><a href="{{route('product-list-by-country',['id' => $team->id])}}">{{$team->name}}</a></li>
                                                @endforeach

                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Other Products <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown">
                                        @foreach($other_categories as $category)
                                        <li><a href="{{route('product-list-others',['id' => $category->id])}}"">{{$category->title}}</a>


                                        </li>
                                        @endforeach


                                    </ul>
                                </li>
                                <li><a href="{{route('about-us')}}">About us</a></li>
                                <li><a href="{{route('contact-us')}}">Contact us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2 col-8">
                    <div class="header-cart-option text-end">
                        <ul>
                            <li>
                                <button type="submit" class="search-trigger"><i class="pe-7s-search"></i></button>
                            </li>
                            <li class="cart-trigger">
                                <a class="active" href="{{route('cart')}}"><i class="pe-7s-cart">
                                    @php $cart = session()->get('cart', []); @endphp
                                    @if($cart)
                                    <span class="badge rounded-circle bg-warning position-absolute top-5 start-100 translate-middle" style="padding:0;width:15px;height:15px;font-size:12px;">
                                        {{ count($cart) }}
                                        <span class="visually-hidden">items in cart</span>
                                    </span>
                                    @endif
                                </i></a>

                            </li>
                            <li class="account-btn position-relative"><i class="pe-7s-config"></i>
                                <ul class="account-list position-absolute">
                                    <li><a href="{{route('account')}}">My Account</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    <li><a href="{{route('register')}}">Register</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none"><div class="mobile-menu"></div></div>
            </div>
        </div>
    </div>
    <!-- end header menu -->

    <!-- Start Search Popup -->
    <div class="box-search-content search_active block-bg close__top">
        <form class="minisearch" action="#">
            <div class="field__search">
                <input type="text" placeholder="Search Our Catalog">
                <div class="action">
                    <a href="#"><i class="pe-7s-search"></i></a>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
    </div>
    <!-- End Search Popup -->
</header>
<!-- header area end -->
