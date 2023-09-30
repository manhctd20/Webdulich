@extends('frontend.master')
@section('title')
    Update Ticket Booking
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Update Ticket Booking</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('air.ticket.list')}}">Ticket List</a></li>
                        <li>Update Ticket Booking</li>
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
                                    <img src="{{asset($ticket->image)}}" height="400px" id="current" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{$ticket->air_name}}</h2>
                            @foreach($locations as $location)
                                @if($location->id == $ticket->start_location_id)
                                    <p class="my-2">Start Location: {{$location->location_name}}</p>
                                @endif
                            @endforeach
                            @foreach($locations as $location)
                                @if($location->id == $ticket->destination_location_id)
                                    <p class="my-2">Destination: {{$location->location_name}}</p>
                                @endif
                            @endforeach


                            <p class="my-2">Economy sit: {{$ticket->economy_sit_number}}</p>
                            <p class="my-2">Economy sit price: {{$ticket->economy_sit_price}}</p>
                            <p class="my-2">Business sit: {{$ticket->business_sit_number}}</p>
                            <p class="my-2">Business sit price: {{$ticket->business_sit_price}}</p>


                            <form action="{{route('edit.ticket.payment')}}" method="GET">
                                @csrf
                                <input type="hidden" name="id" value="{{$single_data->id}}">
                                <div class="single-form form-default">
                                    <label class="my-2">Sit Type</label>
                                    <div class="select-items">
                                        <select name="sit_type" class="form-control">
                                            <option selected disabled>choose sit type</option>
                                            <option value="business_class" {{$single_data->sit_type=='business_class'?'selected':''}}>Business Class</option>
                                            <option value="economy_class" {{$single_data->sit_type=='economy_class'?'selected':''}}>Economy Class</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <lable>Date:</lable>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="date" value="{{$single_data->date}}" class="form-control my-2">
                                    </div>
                                </div>
                                @if(isset(Auth::user()->id))
                                    <input type="hidden" name="user_id" value="{{$single_data->user_id}}">
                                @endif
                                <input type="hidden" name="ticket_id" value="{{$single_data->ticket_id}}">
                                <input type="hidden" name="payment_price" value="{{$single_data->payment_price}}">
                                <input type="hidden" name="business_price" value="{{$ticket->business_sit_price}}">
                                <input type="hidden" name="economy_price" value="{{$ticket->economy_sit_price}}">
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
