@extends('frontend.master')
@section('title')
    Home Page
@endsection
@section('body')
    <section class="hero-area">
        <div class="container">
            {{-- <div class="row">
                <div class="search-box">
                    <form action="{{ route('search') }}" method="get">
                        <input type="text" name="query" placeholder="Tìm kiếm...">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">

                        <div class="hero-slider">

                            <div class="single-slider"
                                style="background-image: linear-gradient(to left, rgba(38,38,38,0.52), rgba(16,15,15,0.73)),url({{ asset('/') }}website/assets/images/slide/anh1.jpg);">
                                <div class="content">
                                    <h3 class="text-light">Thăm quan Việt Nam.</h3>
                                    <div class="button">
                                        <a href="{{ route('tour.list') }}" class="btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>


                            <div class="single-slider"
                                style="background-image: linear-gradient(to left, rgba(38,38,38,0.52), rgba(16,15,15,0.73)),url({{ asset('/') }}website/assets/images/slide/anh2.jpg);">
                                <div class="content">
                                    <h3 class="text-light">Du lịch Việt Nam..</h3>
                                    <div class="button">
                                        <a href="" class="btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                            <div class="single-slider"
                                style="background-image: linear-gradient(to left, rgba(38,38,38,0.52), rgba(16,15,15,0.73)),url({{ asset('/') }}website/assets/images/slide/anh3.jpg);">
                                <div class="content">
                                    <h3 class="text-light">Đi xuyên Việt.</h3>
                                    <div class="button">
                                        <a href="" class="btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                            <div class="single-slider"
                                style="background-image: linear-gradient(to left, rgba(38,38,38,0.52), rgba(16,15,15,0.73)),url({{ asset('/') }}website/assets/images/slide/anh4.jpg);">
                                <div class="content">
                                    <h3 class="text-light">Đi xuyên Việt.</h3>
                                    <div class="button">
                                        <a href="" class="btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                            <div class="single-slider"
                                style="background-image: linear-gradient(to left, rgba(38,38,38,0.52), rgba(16,15,15,0.73)),url({{ asset('/') }}website/assets/images/slide/anh5.jpg);">
                                <div class="content">
                                    <h3 class="text-light">Đi xuyên Việt.</h3>
                                    <div class="button">
                                        <a href="" class="btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">

                            <div class="hero-small-banner"
                                style="background-image: linear-gradient(to left, rgba(38,38,38,0.52), rgba(16,15,15,0.73)),url('{{ asset('/') }}website/assets/images/slide/anh1.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>Việt Nam</span>
                                        <h6 class="text-light">Đà Nẵng, Việt Nam</h6>
                                    </h2>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-6 col-12">

                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2 style="color: red">Hot Deal!</h2>
                                    <p>Tiết kiệm tới 50% cho tất cả các loại đặt phòng trực tuyến trong tuần này.</p>
                                    <div class="button">
                                        <a class="btn" href="{{ route('tour.list') }}">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Tour nổi bật</h2>
                        <p>Tour du lịch hấp dẫn đến bạn và gia đình.</p>
                    </div>
                </div>
            </div>
            <div class="owl-carousel">

                @foreach ($tours as $tour)
                    <div class="single-product">
                        <div class="product-image">
                            <img src="{{ asset($tour->image) }}" height="300px" width="100%" alt="#">
                            <div class="button">
                                <a href="{{ route('tour.details', ['id' => $tour->id]) }}" class="btn">Chi tiết</a>
                            </div>
                        </div>
                        
                        <div class="product-info">
                            
                            <h4 class="title">
                                <a href="#">{{ $tour->name }}</a>
                            </h4>
                            <p class="my-2">Giá: {{ number_format($tour->price) }}</p>
                            <p class="my-2">Thời gian: {{ $tour->duration }}</p>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="shipping-info">
        <div class="container">
            <ul style="display: flex">
                <li>
                    <div class="media-icon">
                        <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                <path
                                    d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                <path
                                    d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                            </svg></i>
                    </div>
                    <div class="media-body">
                        <h5>Miễn phí đặt.</h5>
                        <span>Đặt chuyến tham quan của bạn không phí trung gian.</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            </svg></i>
                    </div>
                    <div class="media-body">
                        <h5>Hỗ trợ 24/7.</h5>
                        <span>Trò chuyện trực tiếp hoặc gọi điện.</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path
                                    d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                            </svg></i>
                    </div>
                    <div class="media-body">
                        <h5>Thanh toán trực tuyến.</h5>
                        <span>Dịch vụ thanh toán an toàn.</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                            </svg></i>
                    </div>
                    <div class="media-body">
                        <h5>Đặt phòng dễ dàng.</h5>
                        <span> Đặt tour du lịch không phức tạp.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
