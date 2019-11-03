@extends('layouts.master-admin')

@section('form')
<form class="search-form d-none d-md-block" action="/search_product" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection

@section('wrapper')
<div class="container">

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
    @endif

    <div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Product Inventory</h4>
                    <a href="{{route("product.create")}}" class="btn btn-primary btn-fw ml-auto mb-3 mb-sm-0"> <i class="icon-plus mr-1"></i> Create Product</a>
                </div>
            <div class="table-responsive">
                <table class="table table-bordered" border="1px solid black">
                    <thead>
                    <tr  class="table-info">
                        <th>No</th>
                        <th>Category</th>
                        <th>Nama Product</th>
                        <th>Pcs</th>
                        <th>Kode Product</th>
                        <th>Harga Barang</th>
                        <th>Foto Product</th>
                        <th>Tgl Registrasi</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $d)
                        <tr  class="table-primary">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->category->category_name}}</td>
                            <td>{{$d->product_name}}</td>
                            <td>{{$d->pcs}}</td>
                            <td>{{$d->product_code}}</td>
                            <td>Rp. {{number_format($d->item_price,'2',',','.')}}</td>
                            <td>{{$d->product_photo}}</td>
                            <td>{{$d->registration_date}}</td>

                            <td>
                                <a class="btn btn-success btn-rounded btn-sm" href="{{route('product.edit', $d->id)}}"><i class="icon-note"></i></a>
                                <a class="btn btn-danger btn-rounded btn-sm" href="{{route('product.destroy', $d->id)}}"><i class="icon-trash"></i></a>
                            </td>
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



@endsection






