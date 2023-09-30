@extends('frontend.master')
@section('title')
    Hotel Price Payment
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Hotel Price Payment</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('hotel.list')}}">Hotel List</a></li>
                        <li>Hotel Price Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="checkout-sidebar-price-table mt-30">
            <h5 class="title">Pricing Table</h5>
            <div class="sub-total-price">
                <div class="total-price">
                    <p class="value">Room Price Per Day:</p>
                    <p class="price">{{$data->room_price}}</p>


                </div>
                <div class="total-price shipping">
                    <p class="value">Number of Room:</p>
                    <p class="price">{{$data->number_of_room}}</p>
                </div>
                <div class="total-price shipping">
                    <p class="value">Total day:</p>
                    @php
                    $earlier = new DateTime($data->checking_in_date);
                    $later = new DateTime($data->checking_out_date);

                    $abs_diff = $later->diff($earlier)->format("%a");
                    @endphp
                    <p class="price">{{$abs_diff}}</p>
                </div>

            </div>
            <div class="total-payable">
                <div class="payable-price">
                    <p class="value">Subotal Price:</p>
                    <p class="price">{{$abs_diff*$data->room_price}}</p>
                </div>
            </div>
            <form action="{{route('hotel.book')}}" method="POST">
                @csrf
                @if(isset(Auth::user()->id))
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                @endif
                <input type="hidden" name="checking_out_date" value="{{$data->checking_out_date}}" class="form-control my-2">
                <input type="hidden" name="checking_in_date" value="{{$data->checking_in_date}}" class="form-control my-2">

                <input type="hidden" name="hotel_id" value="{{$data->hotel_id}}">
                <input type="hidden" name="room_price" value="{{$data->room_price}}">
                <input type="hidden" name="number_of_room" value="{{$data->number_of_room}}">
                <label class="mb-2"><b>Enter Payable Amount</b></label>
                <div class="row">
                    <div class="col-md-12 form-input form">
                        <input type="number" name="payment_price" min="0" class="form-control" placeholder="Enter amount" required>
                    </div>
                </div>
                <div class="price-table-btn button">
                    <button type="submit" class="btn btn-alt">Pay Now</button>
                </div>
            </form>
        </div>
    </div>


@endsection
