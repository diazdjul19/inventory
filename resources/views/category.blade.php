@extends('layouts.master-admin')


@section('form')
<form class="search-form d-none d-md-block" action="/search_category" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection


@section('wrapper')
<div class="container">

    {{-- @if(session('sukses_create_category'))
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
    @endif --}}
    

    <div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card center">
        <div class="card">
            <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
                <h4 class="card-title mb-sm-0">Category Inventory</h4>
                <a href="{{route("category.create")}}" class="btn btn-primary btn-fw ml-auto mb-3 mb-sm-0"> <i class="icon-plus mr-1"></i> Create Category</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>        
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->category_name}}</td>
                            <td>
                                <a class="btn btn-success btn-rounded btn-sm" href="{{route('category.edit', $d->id)}}">Edit</a> 
                                <a class="btn btn-danger btn-rounded btn-sm" href="{{route('category.destroy', $d->id)}}">Delete</a> 
                                {{-- <button type="button" id="button" data-id="{{$d->id}}">Delete</button> --}}
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

{{-- <script>
$('#button').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                type: "POST",
                url: "{{url('/category.destroy')}}",
                data: {id:id},
                success: function (data) {
                              //
                    }         
            });
    });
});
</script> --}}

@include('sweetalert::alert')
@endsection


