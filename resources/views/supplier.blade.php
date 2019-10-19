@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard
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
                </div>

            </div>
        </div>
    </div>



<nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination justify-content-center">
        {{$data_peginate->links()}}
    </ul>
</nav>  
@endsection
