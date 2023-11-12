@extends('frontend.master')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('title')
    Tour Detail Page
@endsection

<style>
    .review {
        padding: 10px;
        margin-bottom: 20px;
        /* background-color: #fff; */
        /* border-bottom: 1px solid #ccc; */
    }

    .review:last-child {
        border-bottom: none;
    }

    .review h5 {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .review .user-info {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .review .rating {
        display: flex;
        justify-items: center;
        align-items: center;
        color: orange;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .review .comment {
        font-size: 16px;
    }

    .review-form {
        background-color: #f9f9f9;
        border: 1px solid #e7e3e3;
        border-radius: 5px;
        /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
        padding: 20px;
        margin-bottom: 20px;
    }

    .review-form h3 {
        font-size: 24px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .review-form label {
        font-weight: bold;
        margin-top: 10px;
    }

    .review-form select,
    .review-form textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .review-form button {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .review-form button:hover {
        background-color: #0056b3;
    }

    .star {
        display: none;
    }

    .star+label {
        font-size: 30px;
        cursor: pointer;
    }

    .star:checked+label,
    .star:hover+label {
        color: orange;
    }

    .star:not(:checked)+label:hover~label {
        color: black;
    }

    .rating input {
        display: none;
    }

    .rating label {
        cursor: pointer;
        width: 25px;
        height: 25px;
        margin-right: 5px;
        background-image: url('{{ asset('/') }}website/assets/images/stars/star-empty.png');
        background-size: cover;
    }

    .rating input:checked+label {
        background-image: url('{{ asset('/') }}website/assets/images/stars/star-fill.png');
    }

    .review-list {
        background-color: #fff;
    }
</style>
<script>
    $(document).ready(function() {
        var expanded = false;

        $('.review').each(function(index) {
            if (index > 2) {
                $(this).hide();
            }
        });

        if ($('.review').length <= 3) {
            $('#showMoreButton').hide();
        }

        // Xử lý khi nhấn vào nút 'Xem thêm'
        $('#showMoreButton').on('click', function() {
            $('.review').each(function(index) {
                if (index > 2) {
                    if (expanded) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                }
            });

            if (expanded) {
                $(this).text('Xem thêm');
            } else {
                $(this).text('Rút gọn');
            }
            expanded = !expanded;
        });
    });


    $(document).ready(function() {
        $('#submitReviewButton').click(function(e) {
                e.preventDefault(); // Ngăn chặn form được gửi đi

                @auth
                $('form').submit();
            @else
                alert('Vui lòng đăng nhập để gửi đánh giá.');
                $('#loginLink')[0].click();
            @endauth
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const ratingInputs = document.querySelectorAll('.star');
        const labels = document.querySelectorAll('.rating label');
        let selectedRating = 0;

        labels.forEach((label, index) => {
            label.addEventListener('mouseover', () => {
                selectedRating = index + 1;
                setRating(selectedRating);
            });

            // label.addEventListener('click', () => {
            //     alert(`Đánh giá của bạn là: ${selectedRating} sao`);
            // });

            label.addEventListener('mouseout', () => {
                setRating(selectedRating);
            });
        });

        function setRating(rating) {
            ratingInputs.forEach((starInput, index) => {
                if (index < rating) {
                    starInput.checked = true;
                } else {
                    starInput.checked = false;
                }
            });
        }
    });
</script>

@section('body')
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset($tour->image) }}" height="400px" id="current" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $tour->name }}</h2>
                            <p class="my-2">Giá: {{ number_format($tour->price) }}đ/người</p>
                            <p class="my-2">Thời gian: {{ $tour->duration }}</p>
                            <p class="my-2">Địa điểm: {{ $tour->location_name }}</p>

                            @if (Auth::check())
                                <a onClick="return confirm('Bạn chắc chắn muốn đặt tour?')"
                                    href="{{ route('tour.payment', ['tour_id' => $tour->id]) }}"
                                    class="btn btn-primary col-lg-4 col-md-4 col-12" id="continue">Đặt ngay
                                </a>
                            @else
                                <p>Bạn cần đăng nhập để tiếp tục đặt tour.</p>
                                <a href="{{ route('login') }}" class="btn btn-primary col-lg-4 col-md-4 col-12">Đăng nhập</a>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 mt-50">
                        <div class="description">
                            <h5 class="title">Tour này có gì hay</h5>
                            {!! $tour->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews section">
        <div class="container">
            {{-- @if (Auth::check()) --}}
            <div class="review-form">
                <h3 class="fw-bold">Đánh Giá</h3>
                <form action="{{ route('review.store') }}" method="Post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                    <label for="rating"></label>
                    <div class="rating">
                        <input class="star" type="checkbox" id="star1" name="rating" value="1">
                        <label for="star1"></label>
                        <input class="star" type="checkbox" id="star2" name="rating" value="2">
                        <label for="star2"></label>
                        <input class="star" type="checkbox" id="star3" name="rating" value="3">
                        <label for="star3"></label>
                        <input class="star" type="checkbox" id="star4" name="rating" value="4">
                        <label for="star4"></label>
                        <input class="star" type="checkbox" id="star5" name="rating" value="5">
                        <label for="star5"></label>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="fw-bold">Bình luận:</label>
                        <textarea class="form-control" name="comment" rows="4"></textarea>
                    </div>
                    <button type="submit" id="submitReviewButton" class="btn btn-primary">
                        Gửi Đánh giá</button>
                </form>
            </div>

            {{-- @endif --}}
            <div class="review-list">

                @foreach ($reviews as $key => $review)
                    <div class="review">
                        <p class="user-info">Người dùng: {{ $users[$key]->name }}</p>
                        <div class="rating">
                            {{ $review->rating }}
                            <img style="padding-left: 6px" width="20" src="/website/assets/images/stars/star-fill.png"
                                alt="">
                        </div>
                        <p class="comment">{{ $review->comment }}</p>
                        <p class="created_at">{{ $review->created_at }}</p>
                        <hr />
                    </div>
                @endforeach

                <button id="showMoreButton" class="btn btn-primary mt-3">Xem thêm</button>

            </div>
        </div>
    </section>

    <section class="interest section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Bạn có thể thích</h2>
                </div>
                @foreach ($interests as $tour)
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset($tour->image) }}" height="300px" alt="#">
                                <div class="button">
                                    <a href="{{ route('tour.details', ['id' => $tour->id]) }}" class="btn">
                                        Xem chi tiết</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="#">{{ $tour->name }}</a>
                                </h4>
                                <p class="my-2">Giá: {{ number_format($tour->price) }}đ</p>
                                <p class="my-2">Thời gian: {{ $tour->duration }}</p>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
