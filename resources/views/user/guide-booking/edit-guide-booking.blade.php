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

                            <form action="{{route('edit.guide.payment')}}" method="GET">
                                @csrf
                                <input type="hidden" name="id" value="{{$single_guid->id}}">
                                <div class="row">
                                    <div class="col-12">
                                        <lable>Date:</lable>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="date" value="{{$single_guid->date}}" class="form-control my-2">
                                    </div>
                                </div>
                                @if(isset(Auth::user()->id))
                                    <input type="hidden" name="user_id" value="{{$single_guid->user_id}}">
                                @endif
                                <input type="hidden" name="guide_id" value="{{$single_guid->guide_id}}">
                                <input type="hidden" name="salary" value="{{$guide->salary}}">

                                <input type="hidden" name="salary_payment" value="{{$single_guid->salary_payment}}">
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
