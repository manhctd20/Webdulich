@extends('admin.master')
@section('title')
    Update Hotel
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <div class="row page-titles mt-4 mt-md-0">
        <div class="col-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Update Hotel</li>
                </ol>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title text-center my-4">Update Hotel</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{route('update.hotel')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$hotel->id}}">
                            <div class="form-group">
                                <label for="hotel_name" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" id="hotel_name" name="hotel_name" value="{{$hotel->hotel_name}}" placeholder="Enter Hotel Name">
                            </div>
                            <div class="form-group">
                                <label for="number_of_room" class="form-label">Number of room</label>
                                <input type="number" class="form-control" id="number_of_room" name="number_of_room" min="1" max="10" value="{{$hotel->number_of_room}}" placeholder="Enter Room Number">
                            </div>
                            <div class="form-group">
                                <label for="room_price" class="form-label">Per room price</label>
                                <input type="number" class="form-control" id="number_of_room" name="room_price" min="1" value="{{$hotel->room_price}}" placeholder="Enter Room Number">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Location</label>
                                <select class="form-control form-select" name="location_id">
                                    <option value="" disabled selected>Choose Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}" {{$location->id==$hotel->location_id?'selected':''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter hotel Description" rows="5">{{$hotel->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="input-file-now" class="form-label">Upload Image</label>
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                            </div>
                            <div class="my-3">
                                <img src="{{asset($hotel->image)}}" height="80px" width="70px" alt="">
                            </div>

                            <button type="submit" class="btn btn-success me-2 text-white">Update Hotel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
@endsection
