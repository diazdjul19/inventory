@extends('layouts.app')

@section('content')
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard 
                    <a href="{{route('stock.create')}}">Tambah Stock</a>

                    <form class="form-inline float-right" action="/search_stock" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped ">
                        <tr>
                            <th>No</th>
                            <th>Nama Product</th>
                            <th>Jumlah Barang</th>
                            <th>Tanggal Update</th>
                            <th>Action</th>

                        </tr>
                
                        @foreach ($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->product->product_name}}</td>
                                <td>{{$d->jml_barang}}</td>
                                <td>{{$d->tgl_update}}</td>
                                
                                <td>
                                    <a href="{{route('stock.edit', $d->id)}}">Edit |</a>
                                    <a href="{{route('stock.destroy', $d->id)}}">Delete</a>
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
