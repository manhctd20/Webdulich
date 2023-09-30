@extends('admin.master')
@section('title')
    Add Tour Guide
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
                    <li class="breadcrumb-item active">Add Tour Guide</li>
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
                <h4 class="card-title text-center my-4">Add Tour Guide</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{route('save.guide')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="guide_name" class="form-label">Tour Guide Name</label>
                                <input type="text" class="form-control" id="guide_name" name="guide_name" placeholder="Enter Tour Guide Name">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="salary" min="0" name="salary" placeholder="Enter Salary">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Location</label>
                                <select  id="tour_location" name="location_id" class="form-control form-select">
                                    <option value="" disabled selected>Choose Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tourist Spot</label>
                                <select class="select2 m-b-10 select2-multiple" name="spot_id[]" id="spot" style="width: 100%" multiple="multiple" placeholder="Choose Spot">
                                    <option value="" disabled>Choose Tourist spot</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="input-file-now" class="form-label">Upload Image</label>
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                            </div>

                            <button type="submit" class="btn btn-success me-2 text-white">Add Tour Guide</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <script>
        $(document).ready(function () {
            $('#tour_location').change(function () {

                var url = '/get-spot/'+$(this).val();
                axios.get(url).then((res)=>{
                    var categoryOptions = "<option disabled>Choose Tourist spot</option>";
                    $.each(res.data, function (index, value) {

                        categoryOptions += '<option  value="'+value.id+'">'+value.spot_name+'</option>';
                        console.log(value)
                    });
                    document.getElementById("spot").innerHTML = categoryOptions;
                });
            })
        })
    </script>
@endsection
