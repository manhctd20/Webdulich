@extends('frontend.master')
@section('title')
    Ticket Detail Page
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Ticket Details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('air.ticket.list')}}">Ticket List</a></li>
                        <li>Ticket Details</li>
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


                            <form action="{{route('pay.ticket.price')}}" method="GET">
                                @csrf
                                <div class="single-form form-default">
                                    <label class="my-2">Sit Type</label>
                                    <div class="select-items">
                                        <select name="sit_type" class="form-control" required>
                                            <option selected disabled>choose sit type</option>
                                            <option value="business_class">Business Class</option>
                                            <option value="economy_class">Economy Class</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <lable>Date:</lable>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="date" class="form-control my-2" required>
                                    </div>
                                </div>
                                @if(isset(Auth::user()->id))
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                @endif
                                <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                <input type="hidden" name="business_price" value="{{$ticket->business_sit_price}}">
                                <input type="hidden" name="economy_price" value="{{$ticket->economy_sit_price}}">

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
                    <p>Explore Ticket in this Destination.</p>
                </div>
                @foreach($interest as $ticket)
                    <div class="col-lg-4 col-md-6 col-12">

                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{asset($ticket->image)}}" height="300px" alt="#">
                                <div class="button">
                                    <a href="{{route('air.ticket.details',['id'=>$ticket->id])}}" class="btn">View Details</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Air Ticket</span>
                                <h4 class="title">
                                    <a href="product-grids.html">{{$ticket->air_name}}</a>
                                </h4>
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
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    {{--                                                        <span>TK. {{$hotel->room_price}}</span>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection
