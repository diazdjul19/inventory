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
            <div class="d-sm-flex align-items-center mb-4">
                <a href="{{route('home')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                    <i class="icon-arrow-left-circle"></i>
                </a>
                
                <h3 class="card-title mb-sm-0">Keuntungan Penjualan Barang</h3>
            </div>
    
            <form action="{{route('cari_laporan_untung')}}" method="get">
                @csrf

                <div class="form-group ">           
                    <label class="form-label ml-2 h3">Nama Product</label>
                    <div class="">
                        <select class="form-control" id="" name="nama_product">
                            <option>-- Pilih Product --</option>
                            @foreach ($product as $item)
                                <option value="{{$item->id}}">{{$item->product_name}}</option>
                            @endforeach
                            <option value="" class="font-weight-bold">All Product</option>
                        </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="" class="form-label ml-2 h3">Dari Tanggal </label>
                    <input type="date" name="dari" class="form-control" id="">
                </div>
                <br>    
                <div class="form-group">
                    <label for="" class="form-label ml-2 h3">Sampai Tanggal </label>
                    <input type="date" name="sampai" class="form-control" id="" >
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>

            <br>
            <br>
            <br>
            <br>

            {{-- Dengan Product --}}
            @if (isset($jumlah_uang_with_name_product))
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-light table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th class="font-weight-bold">#</th>
                                    <th class="font-weight-bold">No Invoive</th>
                                    <th class="font-weight-bold">Nama Product</th>
                                    <th class="font-weight-bold">Harga Per Barang</th>
                                    <th class="font-weight-bold">Jumlah</th>
                                    <th class="font-weight-bold">Diskon</th>
                                    <th class="font-weight-bold">Tanggal</th>
                                    <th class="font-weight-bold">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jumlah_uang_with_name_product as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->no_invoice}}</td>
                                        <td>{{$item->product_name}}</td>
                                        <td>Rp. {{number_format($item->item_price,2,',','.')}}</td>
                                        <td class="text-center">{{$item->qty}} {{$item->satuan}}</td>
                                        <td class="text-center">{{$item->discounts_item}}%</td>
                                        <td>{{date('d M Y', strtotime($item->created_at))}}</td>
                                        <td>Rp. {{number_format($item->total_price,2,',','.')}}</td>
                                    </tr>
                                @endforeach
                                    <tr class="table-success">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total Omset</b></td>
                                        <td><b><i>Rp. {{number_format($total_uang_with_name_product,2,',','.')}}</i></b></td>
                                    </tr>
                                    <tr class="table-info">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total Keuntungan</b></td>
                                        <td><b><i>Rp. {{number_format($data_untung_with_product,2,',','.')}}</i></b></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif




            {{-- Tidak dengan product (All) --}}
            @if (isset($jumlah_uang_not_with_product))
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <h4>Optional : All Product</h4>
                        <table class="table table-light table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th class="font-weight-bold">#</th>
                                    <th class="font-weight-bold">No Invoive</th>
                                    <th class="font-weight-bold">Nama Product</th>
                                    <th class="font-weight-bold">Jumlah</th>
                                    <th class="font-weight-bold">Diskon</th>
                                    <th class="font-weight-bold">Tanggal</th>
                                    <th class="font-weight-bold">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jumlah_uang_not_with_product as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->no_invoice}}</td>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->qty}} {{$item->satuan}}</td>
                                        <td class="text-center">{{$item->discounts_item}}%</td>
                                        <td>{{date('d M Y', strtotime($item->created_at))}}</td>
                                        <td>Rp. {{number_format($item->total_price,2,',','.')}}</td>
                                    </tr>
                                @endforeach

                                    <tr class="table-success">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total Omset :</b></td>
                                        <td><b><i>Rp. {{number_format($total_harga_penjualan,2,',','.')}}</i></b></td>
                                    </tr>
                                    <tr class="table-info">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total Keuntungan :</b></td>
                                        <td><b><i>Rp. {{number_format($data_untung_not_with_product,2,',','.')}}</i></b></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>





@include('sweetalert::alert')
@endsection





