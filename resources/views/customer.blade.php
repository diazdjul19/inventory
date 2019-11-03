@extends('layouts.master-admin')


@section('form')
<form class="search-form d-none d-md-block" action="/search_customer" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection

@section('wrapper')
<div class="container">

    @if(session('sukses_create_customer'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_customer')}}&#128516;</p>
        </div>
    @endif


    @if(session('sukses_edit_customer'))
        <div class="alert alert-primary" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Edit</h4> 
            <p>{{session('sukses_edit_customer')}}&#128523;</p>
        </div>
    @endif

    @if(session('sukses_delete_customer'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Hapus</h4> 
            <p>{{session('sukses_delete_customer')}}&#128517;</p>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        <h4 class="card-title mb-sm-0">Customer Inventory</h4>
                        <a href="{{route("customer.create")}}" class="btn btn-primary btn-fw ml-auto mb-3 mb-sm-0"> <i class="icon-plus mr-1"></i> Create Customer</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                        <table class="table">
                        <thead>
                            <tr>
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Nama</th>
                            <th class="font-weight-bold">Email</th>
                            <th class="font-weight-bold">No HP</th>
                            <th class="font-weight-bold">Alamat</th>
                            <th class="font-weight-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $dc)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dc->name}}</td>
                                    <td>{{$dc->email}}</td>
                                    <td>{{$dc->no_hp}}</td>
                                    <td>{{$dc->address}}</td>

                                    <td>
                                        <a class="btn btn-success btn-rounded btn-sm" href="{{route('customer.edit', $dc->id)}}"><i class="icon-note"></i> Edit</a>
                                        <a class="btn btn-danger btn-rounded btn-sm" href="{{route('customer.destroy', $dc->id)}}"><i class="icon-trash"></i> Delete</a>
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

@endsection
