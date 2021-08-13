@extends('layouts.master-admin')

@section('form')
<form class="search-form d-none d-md-block" action="/search_product" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection

@section('wrapper')
<div class="container">
{{-- 
    @if(session('sukses_create_product'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_product')}}&#128516;</p>
        </div>
    @endif

    @if(session('sukses_edit_product'))
        <div class="alert alert-primary" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Edit</h4> 
            <p>{{session('sukses_edit_product')}}&#128523;</p>
        </div>
    @endif

    @if(session('sukses_hapus_product'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Hapus</h4> 
            <p>{{session('sukses_hapus_product')}}&#128517;</p>
        </div>
    @endif --}}

    <div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Product Inventory</h4>
                        <a href="{{route("export_product")}}" class="btn btn-success btn-icon-text btn-sm ml-auto mb-3 mb-sm-0 mr-3">Export Exel <i class="fas fa-file-excel btn-icon-append"></i></a>
                        <a href="{{route("product_qr")}}" class="btn btn-info btn-icon-text btn-sm mr-3">Download QRCode <i class="fas fa-qrcode btn-icon-append"></i></a>

                        <a href="{{route("product.create")}}" class="btn btn-primary btn-fw"> <i class="icon-plus mr-1"></i> Create Product</a>
                </div>
            <div class="table-responsive border rounded p-1">
                <table class="table table-bordered  table-striped" border="1px solid black">
                    <thead>
                    <tr  class="table-info">
                        <th class="font-weight-bold">No</th>
                        <th class="font-weight-bold text-center">QR Code</th>
                        <th class="font-weight-bold">Category</th>
                        <th class="font-weight-bold">Kode Product</th>
                        <th class="font-weight-bold">Foto Product</th>
                        <th class="font-weight-bold">Nama Product</th>
                        <th class="font-weight-bold">Jumlah Stock</th>
                        <th class="font-weight-bold">Satuan</th>
                        <th class="font-weight-bold">Harga Per Barang</th>
                        <th class="font-weight-bold">Tgl Registrasi</th>
                        <th class="font-weight-bold text-center">Download QR</th>


                        
                        @if (Auth::user()->role == 'admin')
                            <th class="font-weight-bold text-center">Action</th>
                        @elseif(Auth::user()->role == 'kasir')
                            {{-- KOSONG --}}
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $d)
                        <tr>    
                            <td>{{$loop->iteration}}</td>
                            <td>{!! DNS2D::getBarcodeHTML("$d->product_code ", "QRCODE") !!}</td>
                            <td>{{$d->id_category}}</td>
                            <td>{{$d->product_code}}</td>
                            
                            {{-- Mengambil image dari srorage bawaan laravel --}}
                            {{-- <td><img class="rounded mx-auto d-block" style="width: 70px; height:60px;" src="{{url('/storage/product/'.$d->product_photo)}}"></td> --}}

                            {{-- Mengambil image dari storage cloudinary --}}
                            <td><img class="rounded mx-auto d-block" style="width: 70px; height:60px;" src="{{$d->product_photo}}"></td>




                            <td>{{$d->product_name}}</td>
                            <td class="text-center">{{number_format($d->stock,'0','','.')}}</td>
                            <td>{{$d->satuan}}</td>
                            <td>Rp. {{number_format($d->item_price,'2',',','.')}}</td>
                            <td>{{date('d M Y', strtotime($d->registration_date))}} </td>

                            

                            @if (Auth::user()->role == 'admin')
                                <td>
                                    <a href="{{route('each_product_qr', $d->id)}}" class="btn btn-info btn-rounded btn-sm"><i class="fas fa-qrcode mr-1"></i>Download</a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-rounded btn-sm" href="{{route('product.edit', $d->id)}}"><i class="icon-note"></i></a>
                                    <a class="btn btn-danger btn-rounded btn-sm" href="{{route('product.destroy', $d->id)}}"><i class="icon-trash"></i></a>
                                </td>
                            @elseif(Auth::user()->role == 'kasir')
                                {{-- KOSONG --}}
                            @endif
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
                <div class="d-flex mt-2 mr-5 flex-wrap">
                    <nav class="ml-auto">
                    <ul class="pagination separated pagination-info">
                        <li class="page-item">{{$data->links()}}</li>
                        
                    </ul>
                    </nav>
                </div>
        </div>
    </div>
    </div>
</div>


@include('sweetalert::alert')
@endsection






