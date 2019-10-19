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
                <h1 class="mb-3">Tambah Product</h1>   
                <form action="{{route('product.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category ID</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                        <option>-- Pilih Category --</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Product</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"  placeholder=" Product">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Code Product</label>
                        <input type="text" name="product_code" class="form-control" id="exampleInputEmail1"  placeholder=" Product Code">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Barang</label>
                        <input type="text" name="item_price" class="form-control" id="exampleInputEmail1"  placeholder="Item Price">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto Product</label>
                        <input type="text" name="product_photo" class="form-control" id="exampleInputEmail1"  placeholder=" Product Photo">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Registrasi</label>
                        <input type="date" name="registration_date" class="form-control" id="exampleInputEmail1"  placeholder=" Registration Date">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
