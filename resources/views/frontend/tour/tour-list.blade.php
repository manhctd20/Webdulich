@extends('frontend.master')
@section('title')
    Tour List
@endsection
<style>
    .pagination {
        margin: 20px 0;
    }

    .pagination .page-item {
        display: inline;
    }

    .pagination .page-link {
        border: 1px solid #1ABC9C;
        color: #1ABC9C;
    }

    .pagination .page-item.active .page-link {
        background-color: #1ABC9C;
        color: #fff;
    }

    .pagination .page-item.disabled .page-link {
        color: #ccc;
        pointer-events: none;
    }
</style>
@section('body')
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="product-sidebar">
                        <div class="single-widget">
                            <h3>Khu vực</h3>
                            <ul class="list">
                                @foreach ($locations as $location)
                                    <li>
                                        <a href="{{ route('location.tour', ['id' => $location->id]) }}">{{ $location->name }}
                                        </a>
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
                                            <button class="nav-link " id="nav-grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-grid" type="button" role="tab"
                                                aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link active" id="nav-list-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-list" type="button" role="tab"
                                                aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach ($tours as $tour)
                                        <div style="display: flex" class="col-lg-4 col-md-6 col-12">

                                            <div class="single-product">
                                                <div class="product-image">
                                                    <img src="{{ asset($tour->image) }}" height="300px" alt="#">
                                                    <div class="button">
                                                        <a href="{{ route('tour.details', ['id' => $tour->id]) }}"
                                                            class="btn">Chi tiết</a>
                                                    </div>
                                                </div>
                                                <div class="product-info">

                                                    <h4 class="title">
                                                        <a href="#">{{ $tour->name }}</a>
                                                    </h4>
                                                    <p class="my-2">Giá: {{ number_format($tour->price) }}đ</p>
                                                    <p class="my-2">Thời gian: {{ $tour->duration }}</p>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star"></i></li>
                                                        <li><span>4.0 Đánh giá</span></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                                {{-- {{ $tours->links() }} --}}
                                {{-- <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $tour->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $tour->previousPageUrl() }}">
                                            <span>Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $tour->lastPage(); $i++)
                                        <li class="page-item {{ $i == $tour->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $tour->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $tour->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $tour->nextPageUrl() }}">
                                            <span>Next</span>
                                        </a>
                                    </li>
                                </ul> --}}
                            </div>
                            <div class="tab-pane show active fade" id="nav-list" role="tabpanel"
                                aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach ($tours as $tour)
                                        <div class="col-lg-12 col-md-12 col-12">

                                            <div class="single-product">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="product-image">
                                                            <img src="{{ asset($tour->image) }}" height="300px"
                                                                alt="#">
                                                            <div class="button">
                                                                <a href="{{ route('tour.details', ['id' => $tour->id]) }}"
                                                                    class="btn">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-12">
                                                        <div class="product-info">
                                                            <h4 class="title">
                                                                <a href="#">{{ $tour->name }}</a>
                                                            </h4>
                                                            <p class="my-2">Địa điểm: {{ $tour->location_name }}</p>
                                                            <p class="my-2">Giá: {{ number_format($tour->price) }}đ</p>
                                                            <p class="my-2">Thời gian: {{ $tour->duration }}</p>
                                                            <ul class="review">
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star"></i></li>
                                                                <li><span>4.0 Đánh giá</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                                {{-- {{ $tours->links() }} --}}
                                {{-- <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $tour->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $tour->previousPageUrl() }}">
                                            <span>Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $tour->lastPage(); $i++)
                                        <li class="page-item {{ $i == $tour->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $tour->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $tour->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $tour->nextPageUrl() }}">
                                            <span>Next</span>
                                        </a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
