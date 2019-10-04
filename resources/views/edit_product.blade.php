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
                <h1 class="mb-3">Edit Product</h1>   
                <form action="{{route('product.update', $data->id)}}" method="POST">
                    {{method_field('put')}}
                    @csrf
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                        <option value="{{$data->category->id}}">{{$data->category->category_name}}</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Product</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"  placeholder=" Product" value="{{$data->product_name}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Code Product</label>
                        <input type="text" name="product_code" class="form-control" id="exampleInputEmail1"  placeholder=" Product Code" value="{{$data->product_code}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto Product</label>
                        <input type="text" name="product_photo" class="form-control" id="exampleInputEmail1"  placeholder=" Product Photo" value="{{$data->product_photo}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Registrasi</label>
                        <input type="date" name="registration_date" class="form-control" id="exampleInputEmail1"  placeholder=" Registration Date" value="{{$data->registration_date}}">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
