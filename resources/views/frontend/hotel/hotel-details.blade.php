@extends('frontend.master')
@section('title')
    Hotel Detail Page
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Hotel Details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('hotel.list')}}">Hotel</a></li>
                        <li>Hotel Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{asset($hotel->image)}}" height="400px" id="current" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{$hotel->hotel_name}}</h2>
                            <h3 class="price">Tk. {{$hotel->room_price}}</h3>
                            <p class="my-2">Number of room: {{$hotel->number_of_room}}</p>
                            <p class="my-2">Location: {{$hotel->location_name}}</p>
                            <p class="my-2">{{$hotel->description}}</p>
                            <form action="{{route('hotel.payment')}}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <lable>Checking in date:</lable>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="checking_in_date" class="form-control my-2" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <lable>Checking out date:</lable>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="checking_out_date" class="form-control my-2" required>
                                    </div>
                                </div>
                                @if(isset(Auth::user()->id))
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                @endif
                                <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                <input type="hidden" name="room_price" value="{{$hotel->room_price}}">
                                <input type="hidden" name="number_of_room" value="{{$hotel->number_of_room}}">
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button class="btn" type="submit" style="width: 100%;">Book Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="interest section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>You may Interest</h2>
                    <p>Explore more hotel in this location.</p>
                </div>
                @foreach($interests as $hotel)
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{asset($hotel->image)}}" height="300px" alt="#">
                                <div class="button">
                                    <a href="{{route('hotel.details',['id'=>$hotel->id])}}" class="btn">View Details</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Hotel</span>
                                <h4 class="title">
                                    <a href="product-grids.html">{{$hotel->hotel_name}}</a>
                                </h4>
                                <p class="my-2">Number of room: {{$hotel->number_of_room}}</p>
                                <p class="my-2">Location: {{$hotel->location_name}}</p>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>TK. {{$hotel->room_price}}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection
