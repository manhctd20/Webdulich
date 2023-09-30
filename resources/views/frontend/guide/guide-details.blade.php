@extends('frontend.master')
@section('title')
    Guide Detail Page
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Guide Details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('frontend')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('guide.list')}}">Guide List</a></li>
                        <li>Guide Details</li>
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
                                    <img src="{{asset($guide->image)}}" height="400px" id="current" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{$guide->guide_name}}</h2>
                            <p class="my-2">Phone Number: {{$guide->phone_number}}</p>
                            <p class="my-2">Salary: {{$guide->salary}}</p>
                            <p class="my-2">Location: {{$guide->location_name}}</p>
                            <p class="my-2">Spots:</p>
                            <ul class="mb-2">
                                @foreach(json_decode($guide->spot_id) as $id)
                                    @foreach($spots as $spot)
                                        @if($spot->id == $id)
                                        <li class="ms-3">{{$spot->spot_name}}</li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>

                            <form action="{{route('guide.payment')}}" method="GET">
                                @csrf
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
                                <input type="hidden" name="guide_id" value="{{$guide->id}}">
                                <input type="hidden" name="salary" value="{{$guide->salary}}">
                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="button cart-button">
                                                <button class="btn" type="submit" style="width: 100%;">Hire Now</button>
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
                    <p>Explore Tourist Guide in this location.</p>
                </div>
                @foreach($interests as $guide)
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{asset($guide->image)}}" height="300px" alt="#">
                                <div class="button">
                                    <a href="{{route('guide.details',['id'=>$guide->id])}}" class="btn">View Details</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">Tour Guide</span>
                                <h4 class="title">
                                    <a href="product-grids.html">{{$guide->guide_name}}</a>
                                </h4>
                                <p class="my-2">Phone Number: {{$guide->phone_number}}</p>
                                <p class="my-2">Location: {{$guide->location_name}}</p>
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
