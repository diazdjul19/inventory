@extends('layouts.master-admin')

@section('form')
<form class="search-form d-none d-md-block" action="#">
    <i class="icon-magnifier"></i>
    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
</form>
@endsection

@section('wrapper')

<div class="col-md-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
            <div class="d-sm-flex align-items-baseline report-summary-header">
                <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto"><a style="color:black;text-decoration:none;" href="">Updated Report</a></span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
            </div>
            </div>
        </div>
        <div class="row report-inner-cards-wrapper">
            <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
                <span class="report-title mb-2">Jenis Product</span>
                <h4>{{$jumlah_data_Product}} Product</h4>
            </div>
            <div class="inner-card-icon bg-success">
                <i class="icon-briefcase"></i>
            </div>
            </div>
            
            <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
                <span class="report-title mb-2">Penjualan</span>
                <h4>{{$jumlah_data_Sales}} Transaksi</h4>
            </div>
            <div class="inner-card-icon bg-primary">
                <i class="icon-basket"></i>
            </div>
            </div>


            
            <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
                <span class="report-title mb-2">Pembelian</span>
                <h4>{{$jumlah_data_Buying}} Transaksi</h4>
            </div>
            <div class="inner-card-icon bg-info">
                <i class="icon-basket-loaded"></i>
            </div>
            </div>

            <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
                <span class="report-title mb-2">Customer</span>
                <h4>{{$jumlah_data_Customer}} Customer</h4>
            </div>
            <div class="inner-card-icon bg-danger">
                <i class="icon-user"></i>
            </div>
            </div>
            
        </div>
        </div>
    </div>
</div>

<div class="col-md-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="card bg-success ml-2" style="width: 20rem;border-radius:5px; color:white;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-sort-amount-up" style="position:absolute;z-index:0;top:50px;right:15px;opacity:0.4;font-size:80px;"></i>
                        </div>
                        <h5 class="card-title text-white font-weight-bold" style="font-size:18px"> Jumlah Keuntungan</h5>
                        <div class="display-5 mt-4">Rp. {{number_format($total_keuntungan,0,',','.')}}</div>
                        <a style="text-decoration:none" href="{{route('keuntungan_toko')}}"><p class="card-text text-white mt-2">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
                    </div>
                </div>

                <div class="card bg-info ml-2" style="width: 20rem;border-radius:5px; color:white;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-users" style="position:absolute;z-index:0;top:50px;right:15px;opacity:0.4;font-size:80px;"></i>
                        </div>
                        <h5 class="card-title text-white font-weight-bold" style="font-size:18px"> Jumlah User</h5>
                        <div class="display-5 mt-4">36 User</div>
                        <a style="text-decoration:none" href=""><p class="card-text text-white mt-2">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
                    </div>
                </div>

                <div class="card bg-danger ml-2" style="width: 20rem;border-radius:5px; color:white;">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-sort-amount-down" style="position:absolute;z-index:0;top:50px;right:15px;opacity:0.4;font-size:80px;"></i>
                        </div>
                        <h5 class="card-title text-white font-weight-bold" style="font-size:18px"> Jumlah Kerugian</h5>
                        <div class="display-5 mt-4">Rp. 36.000.000.000</div>
                        <a style="text-decoration:none" href=""><p class="card-text text-white mt-2">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


<div class="col-md-12 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
        <div class="" id="chart_penjualan"></div>
    </div>    
</div>
</div>

@include('sweetalert::alert')


@endsection
@push('chart_js')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script >
        Highcharts.chart('chart_penjualan', {

            title: {
                text: 'Solar Employment Growth by Sector, 2010-2016'
            },

            subtitle: {
                text: 'Source: thesolarfoundation.com'
            },

            yAxis: {
                title: {
                    text: 'Number of Employees'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },

            series: [{
                name: 'Installation',
                data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
            }, {
                name: 'Manufacturing',
                data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
            }, {
                name: 'Sales & Distribution',
                data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
            }, {
                name: 'Project Development',
                data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
            }, {
                name: 'Other',
                data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>
@endpush




