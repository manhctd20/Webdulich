@extends('frontend.master')
@section('title')
    Order Payment
@endsection
@section('body')
    <div class="container">
        <div class="checkout-sidebar-price-table mt-30">
            {{-- <h5 class="title">Pricing Table</h5>
            <div class="sub-total-price">
                <div class="total-price">
                    <p class="value">Salary</p>
                    <p class="price">{{$data->salary}}</p>
                </div>


            </div>
            <div class="total-payable">
                <div class="payable-price">
                    <p class="value">Subotal Payment:</p>
                    <p class="price">{{$data->salary}}</p>
                </div>
            </div>
            <form action="{{route('guide.book')}}" method="POST">
                @csrf

                <input type="hidden" name="date" value="{{$data->date}}">
                <input type="hidden" name="user_id" value="{{$data->user_id}}">
                <input type="hidden" name="guide_id" value="{{$data->guide_id}}">
                <label class="mb-2"><b>Enter Payable Amount</b></label>
                <div class="row">
                    <div class="col-md-12 form-input form">
                        <input type="number" name="salary_payment" min="0" class="form-control" placeholder="Enter amount" required>
                    </div>
                </div>
                <div class="price-table-btn button">
                    <button type="submit" class="btn btn-alt">Pay Now</button>
                </div>
            </form> --}}
        </div>
    </div>


@endsection
