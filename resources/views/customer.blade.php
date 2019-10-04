@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('sukses_create_customer'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_customer')}}&#128516;</p>
        </div>
    @endif

{{-- 
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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard 
                    <a href="{{route('customer.create')}}"> Tambah Data Customer</a>

                    <form class="form-inline float-right" action="/search_customer" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Email </th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Action</th>

                        </tr>
                        
                        
                        @foreach ($data as $dc)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dc->name}}</td>
                                <td>{{$dc->email}}</td>
                                <td>{{$dc->no_hp}}</td>
                                <td>{{$dc->address}}</td>

                                <td>
                                    <a href="{{route('customer.edit', $dc->id)}}">Edit |</a>
                                    <a href="{{route('customer.destroy', $dc->id)}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        
                </table>
                </div>
            </div>
        </div>
    </div>
</div>


<nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination justify-content-center">
        {{$data->links()}}
    </ul>
</nav> 
@endsection
