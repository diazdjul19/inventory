@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12 d-sm-flex align-items-center mb-4">
                                <a href="{{route('sales.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="icon-arrow-left-circle"></i>
                                </a>
                                <h4 class="card-title mb-sm-0">Detail Sales</h4>
                                <a href="{{route('generatepdf' , $data->id)}}" class="btn btn-info btn-icon-text ml-auto mb-3 mb-sm-0">Download <i class="fas fa-file-pdf btn-icon-append"></i></a>
                            </div>
                            
                            <div class="col-sm-6">
                                <table class="table w-100">
                                    <tr>
                                        <th>No Invoice</th>
                                        <td>{{$data->no_invoice}}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer</th>
                                        <td>{{$data->customer->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Item (Item ID)</th>
                                        <td>{{$data->product->product_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga Per Item</th>
                                        <td>Rp. {{number_format($data->item_price,2,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Barang</th>
                                        <td>{{$data->qty}}</td>
                                    </tr>
                                    <tr>
                                        <th>Satuan Barang</th>
                                        <td>{{$data->satuan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal & Waktu Penjualan</th>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table w-100">
                                    <tr>
                                        <th>Nominal Pembayaran</th>
                                        <td>Rp. {{number_format($data->payment_nominal,2,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga</th>
                                        <td>Rp. {{number_format($data->total_price,2,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Kembalian</th>
                                        <td>Rp. {{number_format($data->return_nominal,2,',','.')}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection