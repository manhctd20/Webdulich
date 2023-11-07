@extends('frontend.master')
@section('title')
    Order Payment
@endsection

<script>
    function updateTotalPrice() {
    var num_people = document.getElementById('num_people').value;
    var option = document.getElementById('tour').options[document.getElementById('tour').selectedIndex];
    var price = parseFloat(option.getAttribute('data-price'));
    var totalPrice = num_people * price;
    
    var formattedTotalPrice = totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    
    document.getElementById('totalPrice').value = totalPrice;
    document.getElementById('totalPriceDisplay').textContent = formattedTotalPrice;
}

</script>

@section('body')
    <div class="container">
        <div class="row justify-content-center mt-30 mb-30">
            <div class="col-lg-8">
                <div class="card p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="text-center">Đặt tour</h3>
                    <form action="{{route('tour.book')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <div class="form-group mb-3">
                            <label for="tour">Tour</label>
                            <select class="form-control" name="tour_id" id="tour">
                                @foreach ($tours as $tour)
                                    <option value="{{ $tour->id }}" {{ $tourId == $tour->id ? 'selected' : '' }}
                                        data-price="{{ $tour->price }}">
                                        {{ $tour->name }} -- {{ number_format($tour->price) }} vnđ
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Số điện thoại:</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                value="{{ old('phone') }}" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group mb-3">
                            <label for="num_people">Số người tham gia:</label>
                            <input type="number" class="form-control" id="num_people" name="num_people"
                                value="{{ old('num_people') }}" placeholder="Nhập số người tham gia"
                                onchange="updateTotalPrice()">
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Địa điểm đón:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ old('address') }}" placeholder="Nhập địa chỉ đón">
                        </div>
                        <div class="form-group mb-3">
                            <label for="fromDate">Ngày bắt đầu:</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate"
                                value="{{ old('fromDate') }}">
                        </div>
                        <input type="hidden" name="totalPrice" id="totalPrice" value="{{ old('totalPrice') }}">
                        <div class="mb-3">Tổng: <span id="totalPriceDisplay"></span></div>

                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
