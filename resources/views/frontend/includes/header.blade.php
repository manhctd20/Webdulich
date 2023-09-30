<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>


<header class="header navbar-area">

    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="top-end">
                            <ul class="user-login">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <li>
                                            <i class="lni lni-phone"></i>
                                            <a>Phone:
                                                <span> (+100) 123 456 7890</span>
                                            </a>
                                        </li>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <li>
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg></i>
                                            <a>Email:
                                                <span> Email@gmail.com</span>
                                            </a>
                                        </li>
                                    </div>
                                </div>


                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">

                    <a class="navbar-brand" href="{{route('frontend')}}">
                        <h5>Tour Management</h5>
                    </a>

                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">

                    <div class="main-menu-search">

                        <div class="navbar-search search-style-5">

                        </div>

                    </div>

                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                        </div>
                        <div class="navbar-cart">
                            @if(isset(Auth::user()->id))
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="user" style="font-size: 16px;color: #081828">
                                    <i class="lni lni-user me-2"></i>
                                    {{Auth::user()->name}}
                                </a>

                                <div class="shopping-item">
                                    <ul class="shopping-list">
                                        @if(Auth::user()->is_admin == 0)
                                        <li>
                                            <div class="">
                                                <a href="{{route('manage.hotel.booking')}}">Hotel Booked</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="">
                                                <a href="{{route('manage.guide.booking')}}">Guide Booked </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="">
                                                <a href="{{route('manage.ticket.booking')}}">Ticket Booked</a>
                                            </div>
                                        </li>
                                        @elseif(Auth::user()->is_admin == 1)
                                        <li>
                                                <div class="">
                                                    <a href="{{route('admin.home')}}">Dashboard</a>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="bottom">
{{--                                        <div class="button">--}}
{{--                                            <a href="checkout.html" class="btn animate">Logout</a>--}}
{{--                                        </div>--}}
                                        <ul class="button">
                                            <li>
                                                <a href="" class="btn animate" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">Logout</a>
                                            </li>
                                        </ul>
                                        <form action="{{route('logout')}}" id="logoutForm" method="POST">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                            </div>
                            @else
                                <div class="cart-items me-3">
                                    <a href="{{route('login')}}" class="user" style="font-size: 16px;color: #081828">
                                        Login
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="{{route('register')}}" class="user" style="font-size: 16px;color: #081828">
                                        Register
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">



                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{route('frontend')}}" class="{{Request::routeIs('frontend') ? 'active' : ''}}" aria-label="Toggle navigation">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('guide.list')}}" class="{{Request::routeIs('guide.list') ? 'active' : ''}}" aria-label="Toggle navigation">Tour Guide</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('hotel.list')}}" class="{{Request::routeIs('hotel.list') ? 'active' : ''}}" aria-label="Toggle navigation">Contact Us</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('air.ticket.list')}}" class="{{Request::routeIs('air.ticket.list') ? 'active' : ''}}" aria-label="Toggle navigation">About Us</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Suggested Location</a>--}}
{{--                                    <ul class="sub-menu collapse" id="submenu-1-2">--}}
{{--                                        <li class="nav-item"> <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-2-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Suggested Spot</a>--}}
{{--                                            <ul class="sub-menu collapse ms-4" id="submenu-2-2">--}}
{{--                                                <li class="nav-item"><a href="about-us.html">About Us</a></li>--}}
{{--                                                <li class="nav-item"><a href="faq.html">Faq</a></li>--}}
{{--                                                <li class="nav-item"><a href="login.html">Login</a></li>--}}
{{--                                                <li class="nav-item"><a href="register.html">Register</a></li>--}}
{{--                                                <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>--}}
{{--                                                <li class="nav-item"><a href="404.html">404 Error</a></li>--}}
{{--                                            </ul></li>--}}
{{--                                        <li class="nav-item"><a href="faq.html">Faq</a></li>--}}
{{--                                        <li class="nav-item"><a href="login.html">Login</a></li>--}}
{{--                                        <li class="nav-item"><a href="register.html">Register</a></li>--}}
{{--                                        <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>--}}
{{--                                        <li class="nav-item"><a href="404.html">404 Error</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">

            </div>

        </div>
    </div>

</header>
