@extends('frontend.master')
@section('title')
   Manage Hotel Booking
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Manage Hotel Booking</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('hotel.list')}}">Hotel</a></li>
                        <li>Manage Hotel Booking</li>
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
                            <form action="{{route('edit.hotel.payment')}}" method="GET">
                                @csrf
                                <input type="hidden" name="id" value="{{$single_data->id}}">
                                <div class="row">
                                    <div class="col-12">
                                        <lable>Checking in date:</lable>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="checking_in_date" value="{{$single_data->checking_in_date}}" class="form-control my-2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <lable>Checking out date:</lable>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="checking_out_date" value="{{$single_data->checking_out_date}}" class="form-control my-2">
                                    </div>
                                </div>
                                @if(isset(Auth::user()->id))
                                    <input type="hidden" name="user_id" value="{{$single_data->user_id}}">
                                @endif
                                <input type="hidden" name="hotel_id" value="{{$single_data->hotel_id}}">
                                <input type="hidden" name="room_price" value="{{$hotel->room_price}}">
                                <input type="hidden" name="number_of_room" value="{{$hotel->number_of_room}}">
                                <input type="hidden" name="payment_price" value="{{$single_data->payment_price}}">
                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="button cart-button">
                                                <button class="btn" type="submit" style="width: 100%;">Update Payment Now</button>
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
@endsection
