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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
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
            <h4 class="card-title text-center my-4">Manage Tour Booking</h4>
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
                                    @if ($order->status !== 2 && $order->status !== 1)
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('edit.tour.booking', ['id' => $order->id]) }}"
                                                class="btn btn-sm btn-primary me-4"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-pencil"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg></a>
                                            <script>
                                                function cancel() {
                                                    if (confirm('Bạn có chắc chắn muốn hủy Tour?')) {
                                                        document.getElementById('cancel-form').submit();
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
