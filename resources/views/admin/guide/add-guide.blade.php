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
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Tour</li>
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
                <h4 class="card-title text-center my-4">Add Tour</h4>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{ route('save.guide') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">Tour Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Tour Name">
                            </div>
                            <div class="form-group">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration"
                                    placeholder="Enter Duration">
                            </div>
                            <div class="form-group">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" min="0" name="price"
                                    placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label for="location_id" class="form-label">Location</label>
                                <select id="location_id" name="location_id" class="form-control form-select">
                                    <option value="" disabled selected>Choose Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
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
@endsection
@push('script-alt')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
