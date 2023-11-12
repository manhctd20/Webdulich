@extends('admin.master')
@section('title')
    Admin Dashboard
@endsection

@section('body')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row page-titles mt-4 mt-md-0">
        <div class="col-5 align-self-center">
            <h4 class="text-themecolor">Admin Dashboard</h4>
        </div>
        <div class="col-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Admin Dashboard</li>
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
    <div class="row g-0">
        <div id="chart-container"></div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            var completedOrdersData = {!! $completedOrdersData !!};
            var canceledOrdersData = {!! $canceledOrdersData !!};
            var categoriesForChart = {!! $categoriesForChart !!};
            console.log(completedOrdersData);
            Highcharts.chart('chart-container', {
                chart: {
                    type: 'area',
                },

                title: {
                    text: 'Báo cáo thống kê',
                    align: 'left',
                },
                subtitle: {
                    text: '',
                    align: 'left',
                },
                yAxis: {
                    title: {
                        useHTML: true,
                        text: 'Số lượng Order',
                    },
                },
                tooltip: {
                    shared: false,
                },
                plotOptions: {
                    area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        dataLabels: {
                            enabled: true, // Bật data labels
                            format: '{point.name}', // Hiển thị tên của vùng khi hover
                        },
                        marker: {
                            // lineWidth: 1,
                            // lineColor: '#666666',
                            enabled: true,
                            symbol: 'circle',
                            // radius: 2,
                            states: {
                                hover: {
                                    enabled: true,
                                },
                            },
                        },
                    },
                },
              
                xAxis: {
                    categories: categoriesForChart,
                },
                series: [{
                    name: 'Completed Orders',
                    data: completedOrdersData,
                }, {
                    name: 'Canceled Orders',
                    data: canceledOrdersData,
                }],
            });
        </script>
    
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
@endsection
