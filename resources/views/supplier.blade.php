@extends('layouts.master-admin')

@section('form')
<form class="search-form d-none d-md-block" action="/search_supplier" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>   
@endsection

@section('wrapper')
    <div class="container">

    {{-- @if(session('sukses_create_supplier'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_supplier')}}&#128516;</p>
        </div>
    @endif

    @if(session('sukses_edit_supplier'))
        <div class="alert alert-primary" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Edit</h4> 
            <p>{{session('sukses_edit_supplier')}}&#128523;</p>
        </div>
    @endif

    @if(session('sukses_delete_supplier'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Hapus</h4> 
            <p>{{session('sukses_delete_supplier')}}&#128517;</p>
        </div>
    @endif --}}

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Dashboard
                        <a href="{{route('supplier.create')}}">Tambah Supplier</a>

                        <form class="form-inline float-right" action="/search_supplier" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-hover table-striped ">
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Nama Perusahaan</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Negara</th>
                                <th>Kode POS</th>
                                <th>Nama Bank</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach ($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->supplier_name}}</td>
                                    <td>{{$d->legal_name}}</td>
                                    <td>{{$d->mobile_number}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>{{$d->addres}}</td>
                                    <td>{{$d->country}}</td>
                                    <td>{{$d->zib_code}}</td>
                                    <td>{{$d->bank_name}}</td>

                                    <td>
                                        <a href="{{route('supplier.edit', $d->id)}}">Edit |</a>
                                        <a href="{{route('supplier.destroy', $d->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </table>
                    </div> --}}

                    <div class="card-body">
                        <div class="d-sm-flex align-items-center mb-4">
                            <h4 class="card-title mb-sm-0">Supplier Inventory</h4>
                            <a href="{{route("supplier.create")}}" class="btn btn-primary btn-fw ml-auto mb-3 mb-sm-0"> <i class="icon-plus mr-1"></i> Create Supplier</a>
                        </div>
                        <div class="table-responsive border rounded p-1">
                            <table class="table table-striped">
                            <thead>
                                <tr class="table-success">
                                    <th class="font-weight-bold">No</th>
                                    <th class="font-weight-bold">Nama Supplier</th>
                                    <th class="font-weight-bold">Nama Perusahaan</th>
                                    <th class="font-weight-bold">No HP</th>
                                    <th class="font-weight-bold">Email</th>
                                    {{-- <th class="font-weight-bold">Alamat</th>
                                    <th class="font-weight-bold">Negara</th>
                                    <th class="font-weight-bold">Kode POS</th>
                                    <th class="font-weight-bold">Nama Bank</th> --}}
                                    <th class="font-weight-bold text-center">Action</th>
                                    <th class="font-weight-bold">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->supplier_name}}</td>
                                        <td>{{$d->legal_name}}</td>
                                        <td>{{$d->mobile_number}}</td>
                                        <td>{{$d->email}}</td>
                                        {{-- <td>{{$d->addres}}</td>
                                        <td>{{$d->country}}</td>
                                        <td>{{$d->zib_code}}</td>
                                        <td>{{$d->bank_name}}</td> --}}

                                        <td>
                                            <a class="btn btn-success btn-rounded btn-sm" href="{{route('supplier.edit', $d->id)}}">Edit</a>
                                            <a class="btn btn-danger btn-rounded btn-sm" href="{{route('supplier.destroy', $d->id)}}">Delete</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-rounded btn-sm" href="{{route('supplier.show', $d->id)}}">Info</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
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
    </div>
@include('sweetalert::alert')
@endsection
