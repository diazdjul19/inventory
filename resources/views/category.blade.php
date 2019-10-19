@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('sukses_create_category'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_category')}}&#128516;</p>
        </div>
    @endif

    @if(session('sukses_edit_category'))
        <div class="alert alert-primary" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Edit</h4> 
            <p>{{session('sukses_edit_category')}}&#128523;</p>
        </div>
    @endif

    @if(session('sukses_hapus_category'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Hapus</h4> 
            <p>{{session('sukses_hapus_category')}}&#128517;</p>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard 
                    <a href="{{route('category.create')}}">Tambah Category</a>

                    <form class="form-inline float-right" action="/search_category" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                </div>


                <div class="card-body tabel-responsive">
                    <table class="table table-hover  table-striped ">
                        <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>

                        @foreach($data as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->category_name}}</td>

                            <td>
                                <a href="{{route('category.edit', $d->id)}}">Edit</a> |
                                <a href="{{route('category.destroy', $d->id)}}">Delete</a>
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
