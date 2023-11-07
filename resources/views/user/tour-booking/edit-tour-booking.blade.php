@extends('frontend.master')
@section('title')
    Tour Detail Page
@endsection

<script>
    function updateTotalPrice() {
        var num_people = document.getElementById('num_people').value;
        var priceInput = document.getElementById('price');
        var price = parseFloat(priceInput.getAttribute('data-price'));
        var totalPrice = num_people * price;

        var formattedTotalPrice = totalPrice.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });

        document.getElementById('totalPrice').value = totalPrice;
        document.getElementById('totalPriceDisplay').textContent = formattedTotalPrice;
    }
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
                                    <img src="{{ asset($tours->image) }}" height="400px" id="current" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <h3 class="text-center">Update tour</h3>
                        <form action="{{ route('update.tour.booking') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                <label for="name">Tour</label>
                                <input disabled type="text" class="form-control" id="name" name="name"
                                    value="{{ $tours->name }}">
                                <label for="price">Price</label>
                                <input disabled type="number" class="form-control" id="price" name="price"
                                    value="{{ $tours->price }}" data-price="{{ $tours->price }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Số điện thoại:</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ $order->phone }}" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group mb-3">
                                <label for="num_people">Số người tham gia:</label>
                                <input type="number" class="form-control" id="num_people" name="num_people"
                                    value="{{ $order->num_people }}" placeholder="Nhập số người tham gia"
                                    onchange="updateTotalPrice()">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Địa điểm đón:</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $order->address }}" placeholder="Nhập địa chỉ đón">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fromDate">Ngày bắt đầu:</label>
                                <input type="date" class="form-control" id="fromDate" name="fromDate"
                                    value="{{ $order->fromDate }}">
                            </div>
                            <input type="hidden" name="totalPrice" id="totalPrice" value="{{ $order->totalPrice }}">
                            <div class="mb-3">Tổng: <span id="totalPriceDisplay"></span></div>

                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
