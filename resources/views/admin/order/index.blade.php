@extends('user.master')
@section('title')
    Manage Tour Booking
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
                    <li class="breadcrumb-item active">Manage Tour Booking</li>
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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center my-4">Manage Tour Order</h4>
            <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border no-wrap">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <script>
                        setTimeout(function() {
                            var alertElement = document.querySelector('.alert');
                            if (alertElement) {
                                alertElement.style.display = 'none'; // Ẩn thông báo
                            }
                        }, 10000);
                    </script>
                    <thead>
                        <tr>
                            <th>Tour Name</th>
                            <th>User Name</th>
                            <th>From Date</th>
                            <th>People</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->tours_name }}</td>
                                <td>{{ $order->users_name }}</td>
                                <td>{{ $order->fromDate }}</td>
                                <td>{{ $order->num_people }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ number_format($order->totalPrice) }}đ</td>
                                <td>
                                    @if ($order->status === 1)
                                        Đã xác nhận
                                    @elseif($order->status === 2)
                                        Đã hủy
                                    @else
                                        Chờ xác nhận
                                    @endif
                                </td>
                                <td>
                                    @if ($order->status !== 2)
                                        <div class="d-flex align-items-center">
                                            <form id="accept-form"
                                                action="{{ route('acceptOrder', ['id' => $order->id]) }}"
                                                method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                              
                                                <button type="button" class="btn btn-sm btn-success" onclick="add()">
                                                    Xác nhận
                                                </button>
                                            </form>
                                            {{-- <a href="{{ route('edit.tour.booking', ['id' => $order->id]) }}"
                                                class="btn btn-sm btn-primary me-4">  
                                            </a> --}}
                                            <script>
                                                function cancel() {
                                                    if (confirm('Bạn có chắc chắn muốn hủy Tour?')) {
                                                        document.getElementById('cancel-form').submit();
                                                    }
                                                }
                                                function add() {
                                                    if (confirm('Bạn có chắc chắn muốn xác nhận Tour?')) {
                                                        document.getElementById('accept-form').submit();
                                                    }
                                                }
                                            </script>
                                            <form id="cancel-form"
                                                action="{{ route('cancel.tour.booking', ['id' => $order->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger" onclick="cancel()">Hủy
                                                    Tour</button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
@endsection
