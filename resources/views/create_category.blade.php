@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Dashboard 
                    <a href="{{route('category.create')}}">Tambah Category</a>
                </div> --}}

                <div class="card-body">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"  placeholder=" Category">
                
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
