@extends('layouts.master-admin')


@section('form')
<form class="search-form d-none d-md-block" action="/search_stock" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection



@section('wrapper')
<div class="container">

    @if(session('sukses_create_stock'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_stock')}}&#128516;</p>
        </div>
    @endif

    @if(session('sukses_edit_stock'))
        <div class="alert alert-primary" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Edit</h4> 
            <p>{{session('sukses_edit_stock')}}&#128523;</p>
        </div>
    @endif

    @if(session('sukses_hapus_stock'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Hapus</h4> 
            <p>{{session('sukses_hapus_stock')}}&#128517;</p>
        </div>
    @endif
    
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Stock Inventory</h4>
                    <a href="{{route("stock.create")}}" class="btn btn-primary btn-fw ml-auto mb-3 mb-sm-0"> <i class="icon-plus mr-1"></i> Create Stock</a>
                </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="font-weight-bold"> No </th>
                        <th class="font-weight-bold"> Nama Product </th>
                        <th class="font-weight-bold"> Jumlah Barang </th>
                        <th class="font-weight-bold"> Tanggal Update </th>
                        <th class="font-weight-bold"> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->product->product_name}}</td>
                                <td>{{$d->jml_barang}}</td>
                                <td>{{$d->tgl_update}}</td>
                                
                                <td>
                                    <a class="btn btn-success btn-rounded btn-sm" href="{{route('stock.edit', $d->id)}}"><i class="icon-note"></i> Edit</a>
                                    <a class="btn btn-danger btn-rounded btn-sm" href="{{route('stock.destroy', $d->id)}}"><i class="icon-trash"></i> Delete</a>
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



