@extends('frontend.master')
@section('title')
    About Us
@endsection
@section('body')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Giới thiệu</h2>
                    <p class="about">
                        Hệ thống là trang web cung cấp các thông tin hữu ích cho khách hàng về những tour du lịch, địa điểm
                        du lịch đẹp tại Việt Nam, thông tin du lịch chi tiết nhất, phù hợp với sở thích, mức thu nhập cá
                        nhân cùng dịch vụ thanh toán uy tín, chất lượng.
                        <br/>
                        Travel tour - hứa hẹn mang đến cho bạn những điều tuyệt vời nhất trong chuyến du lịch của mình.
                    </p>
                    <h2>Liên hệ chúng tôi</h2>
                    <p>Nếu bạn có bất kỳ câu hỏi hoặc ý kiến phản hồi, vui lòng liên hệ với chúng tôi qua thông tin sau:</p>
                    <ul>
                        <li>Email: email@gmail.com</li>
                        <li>Điện thoại: 123-456-7890</li>
                        <li>Địa chỉ: Hà Đông, Hà Nội, Việt Nam </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('/') }}website/assets/images/lienhe.jpg" alt="#">
                </div>
            </div>
            <div class="col-md-6">
                {{-- <h2>Form Liên Hệ</h2> --}}
                <form class="form-contact">
                    <div class="form-group">
                        <label class="item" for="name">Họ và Tên</label>
                        <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label class="item" for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email">
                    </div>
                    <div class="form-group">
                        <label class="item" for="message">Nội dung</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Nhập nội dung liên hệ"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
    </section>

    <style>

        .section {
            padding: 60px 0;
        }
    
        h2 {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }
    
        p {
            font-size: 16px;
        }
        
        .about{
            text-indent: 20px;
            margin-bottom: 30px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    
        ul li {
            font-size: 16px;
            margin-bottom: 10px;
        }
    
        .form-contact {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }
    
        .form-group {
            margin-bottom: 20px;
        }
        .form-group .item{
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
        }
        .form-group .form-control::placeholder{
            font-size: 14px;
        }
    
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 20px;
            font-size: 16px;
        }
    
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
    
@endsection
