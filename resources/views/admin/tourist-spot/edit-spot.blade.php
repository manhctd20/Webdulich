@extends('admin.master')
@section('title')
    Edit Spot
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
                    <li class="breadcrumb-item active">Add Tourist Spot</li>
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
                <h4 class="card-title text-center my-4">Update Tourist Spot</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{route('update.spot')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$spot->id}}">
                            <div class="form-group">
                                <label class="form-label">Location</label>
                                <select class="form-control form-select" name="location_id">
                                    <option value="" disabled selected>Choose Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}" {{$spot->location_id == $location->id?'selected':''}}>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location" class="form-label">Spot Name</label>
                                <input type="text" class="form-control" id="location" name="spot_name" value="{{$spot->spot_name}}" placeholder="Enter Location Name">
                            </div>
                            <button type="submit" class="btn btn-success me-2 text-white">Update Tourist Spot</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
@endsection
