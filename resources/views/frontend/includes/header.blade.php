<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->
<style>
    /* CSS */
    .search-container {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 20px;
        overflow: hidden;
        transition: border-color 0.3s;
        width: 350px;
        float: right;

    }

    .search-container:hover {
        border-color: #007bff;
    }

    .search-container .search-input {
        border: none;
        outline: none;
        /* padding: 6px; */
        padding-left: 10px;
        flex: 1;
    }

    .search-input::placeholder{
        font-size: 14px;
    }

    .search-container .search-button {
        background: none;
        border: none;
        cursor: pointer;
        /* padding: 6px; */
        padding-right: 10px; 
    }
</style>

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>


<header class="header navbar-area">
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">

                    <a class="navbar-brand" href="{{ route('frontend') }}">
                        <h5 style="font-size: 24px ">Travel Tour</h5>
                    </a>

                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">

                    <div class="main-menu-search">


                    </div>

                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                        </div>
                        <div class="navbar-cart">
                            @if (isset(Auth::user()->id))
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="user" style="font-size: 16px;color: #081828">
                                        <i class="lni lni-user me-2"></i>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="shopping-item">
                                        <ul class="shopping-list">
                                            @if (Auth::user()->is_admin == 0)
                                                <li>
                                                    {{-- <div class="">
                                                <a href="{{route('manage.guide.booking')}}">Tour của bạn</a>
                                            </div> --}}
                                                </li>
                                            @elseif(Auth::user()->is_admin == 1)
                                                <li>
                                                    <div class="">
                                                        <a href="{{ route('admin.home') }}">Dashboard</a>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="bottom">
                                            <ul class="button">
                                                <li>
                                                    <a href="" class="btn animate"
                                                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">Logout</a>
                                                </li>
                                            </ul>
                                            <form action="{{ route('logout') }}" id="logoutForm" method="POST">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="cart-items me-3">
                                    <a href="{{ route('login') }}" id="loginLink" class="user"
                                        style="font-size: 16px;color: #081828">
                                        Đăng Nhập
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="{{ route('register') }}" class="user"
                                        style="font-size: 16px;color: #081828">
                                        Đăng Ký
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
        <div class="row align-items-center d-flex ">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ route('frontend') }}"
                                        class="{{ Request::routeIs('frontend') ? 'active' : '' }}"
                                        style="font-size: 16px " aria-label="Toggle navigation">Trang Chủ</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('tour.list') }}"
                                        class="{{ Request::routeIs('tour.list') ? 'active' : '' }}"
                                        style="font-size: 16px " aria-label="Toggle navigation">Tour du lịch</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('about') }}"
                                        class="{{ Request::routeIs('about') ? 'active' : '' }}"
                                        style="font-size: 16px " aria-label="Toggle navigation">Liên hệ</a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                {{-- <div class="main-menu-search"> --}}
                    <div class="navbar-search search-style-5">
                        <div class="search-box">
                            <form action="{{ route('search') }}" method="get">
                                <div class="input-group search-container">
                                    <input type="text" name="query" placeholder="Tìm kiếm..."
                                        class="form-control search-input">
                                    <button type="submit" class="btn search-button">
                                        <i class="lni lni-search-alt"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>

        </div>
    </div>

</header>
