@extends('layouts.master-admin')


@section('form')
<form class="search-form d-none d-md-block" action="/search_user" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection

@section('wrapper')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        <h4 class="card-title mb-sm-0">Management User</h4>
                        <a href="{{Route('user.create')}}" class="btn btn-info btn-fw ml-auto mb-3 mb-sm-0"> <i class="icon-plus mr-1"></i> Create New User</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                        <table class="table table-striped">
                        <thead>
                            <tr class="table-info">
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Foto User</th>
                            <th class="font-weight-bold">Nama User</th>
                            <th class="font-weight-bold">Email User</th>
                            <th class="font-weight-bold">Tingkat User</th>
                            <th class="font-weight-bold text-center">Tanggal Registrasi</th>
                            <th class="font-weight-bold text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $du)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="py-1 text-center">
                                        {{-- MENGAMBIL IMAGE DARI STORAGE BAWAAN LARAVEL --}}
                                        {{-- <img style="width: 50px; height:50px;" src="{{url('/storage/user/'.$du->user_photo)}}"> --}}

                                        {{-- MENGAMBIL IMAGE DARI STORAGE CLOUDINARY --}}
                                        <img style="width: 50px; height:50px;" src="{{$du->user_photo}}">

                                    </td>
                                    <td>{{$du->name}}</td>
                                    <td>{{$du->email}}</td>
                                    <td class="text-center">
                                        @if ($du->role == 'admin')
                                            <span class="badge badge-info p-2">ADMIN</span>                                        
                                        @elseif($du->role == 'kasir')
                                            <span class="badge badge-primary p-2">KASIR</span>                                                                                                               
                                        @endif
                                    </td> 
                                    <td class="text-center">{{date('d M Y  - H:i:s', strtotime($du->created_at))}}</td>


                                    <td class="text-center">
                                        <a class="btn btn-success btn-rounded btn-sm" href="{{route('user.edit', $du->id)}}"><i class="icon-note"></i></a>
                                        <a class="btn btn-danger btn-rounded btn-sm" href="{{route('user.destroy', $du->id)}}"><i class="icon-trash"></i></a>
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

