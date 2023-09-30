@extends('admin.master')
@section('title')
    Update Air Ticket
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
                    <li class="breadcrumb-item active">Update Air Ticket</li>
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
                <h4 class="card-title text-center my-4">Update Air Ticket</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{route('update.airTicket')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$air_ticket->id}}">
                            <div class="form-group">
                                <label for="air_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="air_name" name="air_name" value="{{$air_ticket->air_name}}" placeholder="Enter Plane Name">
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">From</label>
                                        <select class="form-control form-select" name="start_location_id">
                                            <option value="" disabled selected>Choose Start Location</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}" {{$air_ticket->start_location_id==$location->id?'selected':''}}>{{$location->location_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">To</label>
                                        <select class="form-control form-select" name="destination_location_id">
                                            <option value="" disabled selected>Choose Destination Location</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}" {{$air_ticket->destination_location_id==$location->id?'selected':''}}>{{$location->location_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="business_sit_number" class="form-label">Number of business class sit</label>
                                        <input type="number" class="form-control" id="business_sit_number" min="1" max="100" name="business_sit_number" value="{{$air_ticket->business_sit_number}}" placeholder="Enter number of sit">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="business_sit_price" class="form-label">Price of business class sit</label>
                                        <input type="number" class="form-control" id="business_sit_price" min="1" name="business_sit_price" value="{{$air_ticket->business_sit_price}}" placeholder="Enter price of sit">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="economy_sit_number" class="form-label">Number of economy class sit</label>
                                        <input type="number" class="form-control" id="economy_sit_number" min="1" max="100" name="economy_sit_number" value="{{$air_ticket->economy_sit_number}}" placeholder="Enter number of sit">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="economy_sit_price" class="form-label">Price of economy class sit</label>
                                        <input type="number" class="form-control" id="economy_sit_price" min="1" name="economy_sit_price" value="{{$air_ticket->economy_sit_price}}" placeholder="Enter price of sit">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-file-now" class="form-label">Upload Logo</label>
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                            </div>
                            <div class="my-3">
                                <img src="{{asset($air_ticket->image)}}" height="80px" width="70px" alt="">
                            </div>
                            <button type="submit" class="btn btn-success me-2 text-white">Update Air Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
@endsection
