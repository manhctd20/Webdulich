@extends('frontend.master')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('title')
    Tour Detail Page
@endsection
<script>
     $(document).ready(function() {
        $('#submitReviewButton').click(function(e) {
            e.preventDefault(); // Ngăn chặn form được gửi đi

            // // Kiểm tra xem người dùng đã đăng nhập hay chưa
            @auth
                // Nếu đã đăng nhập, cho phép gửi đánh giá
                $('form').submit();
            @else
                // Nếu chưa đăng nhập, hiển thị thông báo
                alert('Vui lòng đăng nhập để gửi đánh giá.');
                $('#loginLink')[0].click(); // Sử dụng click() để điều hướng đến trang đăng nhập
            @endauth
        });
    });
</script>
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        // Lấy trường input số lượng người và giá từ DOM
        const quantityInput = document.getElementById("quantity");
        const guideSalaryInput = document.getElementById("guide_salary");

        // Lắng nghe sự kiện thay đổi số lượng người
        quantityInput.addEventListener("input", function () {
            const quantity = parseFloat(quantityInput.value);
            const guideSalary = parseFloat(guideSalaryInput.value);

            // Tính tổng tiền
            const totalPrice = quantity * guideSalary;

            // Hiển thị tổng tiền lên trang
            document.getElementById("total_price").textContent = totalPrice.toFixed(2);
        });
    });
</script>


{{-- <script>
    
    document.addEventListener("DOMContentLoaded", function() {
        const ratingInputs = document.querySelectorAll('.star');
        const labels = document.querySelectorAll('.rating label');
        let selectedRating = 0;

        labels.forEach((label, index) => {
            label.addEventListener('mouseover', () => {
                selectedRating = index + 1;
                setRating(selectedRating);
            });

            label.addEventListener('click', () => {
                alert(`Đánh giá của bạn là: ${selectedRating} sao`);
            });

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
</script> --}}
<style>
    .rating {
        display: inline-block;
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

    .rating {
        display: inline-block;
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

    .review-form {
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .review-form h3 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .review-form form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
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
</style>

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
                            <p class="my-2">Giá: {{ $tour->price }}</p>
                            <p class="my-2">Thời gian: {{ $tour->duration }}</p>
                            {{-- <p class="my-2">Khu vực: {{ $tour->location_name }}</p> --}}
                            

                            <form action="{{ route('tour.payment') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for="quantity">Số người:</label>
                                        <input type="number" name="quantity" class="form-control my-2" required>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label>Ngày:</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="date" name="date" class="form-control my-2" required>
                                    </div>
                                    <div class="col-12">
                                        <p>Tổng tiền: <span id="total_price">{{ $tour->price }}</span></p>
                                    </div>                                    
                                </div>
                                @if (isset(Auth::user()->id))
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endif
                                <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                <input type="hidden" name="salary" value="{{ $tour->price }}">
                                <input type="hidden" name="salary" id="tour_salary" value="{{ $tour->price }}">
                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="button cart-button">
                                                <button class="btn" type="submit" style="width: 100%;">Đặt ngay</button>
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

    <section class="reviews section">
        <div class="container">
            <div class="section-title">
                <h2>Reviews</h2>
            </div>

            <div class="review-list">
                {{-- @foreach ($guide->reviews as $review)
                    <div class="review"> 
                        <div class="user-info">
                            <span class="user-name">{{ $review->user->name }}</span>
                        </div>
                        <div class="rating">
                            Rating: {{ $review->rating }} out of 5
                        </div>
                        <div class="comment">
                            {{ $review->comment }}
                        </div>
                    </div>
                @endforeach --}}
            </div>

            {{-- @if (Auth::check()) --}}
                <div class="review-form">
                    <h3>Post a Review</h3>
                    <form action="{{ route('guide.postReview') }}" method="POST">
                        @csrf
                        <input type="hidden" name="guide_id" value="1">
                        <label for="rating">Rating:</label>
                        <div class="rating">
                            <input class="star" type="checkbox" id="star5" name="rating" value="5">
                            <label for="star5"></label>
                            <input class="star" type="checkbox" id="star4" name="rating" value="4">
                            <label for="star4"></label>
                            <input class="star" type="checkbox" id="star3" name="rating" value="3">
                            <label for="star3"></label>
                            <input class="star" type="checkbox" id="star2" name="rating" value="2">
                            <label for="star2"></label>
                            <input class="star" type="checkbox" id="star1" name="rating" value="1">
                            <label for="star1"></label>
                        </div>

                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="comment" rows="4"></textarea>
                        <button type="submit" id="submitReviewButton">Submit Review</button>
                    </form>
                </div>
            {{-- @endif --}}
        </div>
    </section>

    <section class="interest section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Bạn có thể thích</h2>
                    <p>Explore Tourist Guide in this location.</p>
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
                                <p class="my-2">Giá: {{ number_format($tour->price) }}</p>
                                <p class="my-2">Thời gian: {{ $tour->duration }}</p>    
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
