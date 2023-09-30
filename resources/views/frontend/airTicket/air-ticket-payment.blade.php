@extends('frontend.master')
@section('title')
    Ticket Price Payment
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Ticket Price Payment</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('air.ticket.list')}}">Ticket List</a></li>
                        <li>Ticket Price Payment</li>
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
                    <p class="value">Sit Type:</p>
                    @if($data->sit_type=='business_class')
                    <p class="price">Business Class</p>
                    @elseif($data->sit_type=='economy_class')
                    <p class="price">Economy Class</p>
                    @endif

                </div>
                <div class="total-price shipping">
                    <p class="value">Sit Price:</p>
                    @if($data->sit_type=='business_class')
                        <p class="price">{{$data->business_price}}</p>
                    @elseif($data->sit_type=='economy_class')
                        <p class="price">{{$data->economy_price}}</p>
                    @endif
                </div>

            </div>
            <div class="total-payable">
                <div class="payable-price">
                    <p class="value">Subotal Price:</p>
                    @if($data->sit_type=='business_class')
                        <p class="price">{{$data->business_price}}</p>
                    @elseif($data->sit_type=='economy_class')
                        <p class="price">{{$data->economy_price}}</p>
                    @endif
                </div>
            </div>
            <form action="{{route('ticket.book')}}" method="POST">
                @csrf
                <input type="hidden" name="sit_type" value="{{$data->sit_type}}">
                <input type="hidden" name="date" value="{{$data->date}}">
                <input type="hidden" name="user_id" value="{{$data->user_id}}">
                <input type="hidden" name="ticket_id" value="{{$data->ticket_id}}">
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
