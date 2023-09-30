@extends('frontend.master')
@section('title')
    Hotel List
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Hotel List</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Hotel List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">

                    <div class="product-sidebar">



                        <div class="single-widget">
                            <h3>All Location</h3>
                            <ul class="list">
                                @foreach($locations as $location)
                                <li>
                                    <a href="{{route('location.hotel',['id'=>$location->id])}}">{{$location->location_name}} </a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <h3 class="total-show-product">Showing: <span>1 - 10 items</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link " id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link active" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach($hotels as $hotel)
                                    <div class="col-lg-4 col-md-6 col-12">

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
                                {{$hotels->links()}}
                            </div>
                            <div class="tab-pane show active fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach($hotels as $hotel)
                                    <div class="col-lg-12 col-md-12 col-12">

                                        <div class="single-product">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="product-image">
                                                        <img src="{{asset($hotel->image)}}" height="300px" alt="#">
                                                        <div class="button">
                                                            <a href="{{route('hotel.details',['id'=>$hotel->id])}}" class="btn">View Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-12">
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
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                {{$hotels->links()}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
