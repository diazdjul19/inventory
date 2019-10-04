@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <h1 class="mb-3">Tambah Stock</h1>   
                <form action="{{route('stock.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Product ID</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="product_id">
                            <option>-- Pilih Product --</option>
                            @foreach ($product as $item)
                                <option value="{{$item->id}}">{{$item->product_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Barang</label>
                        <input type="number" name="jml_barang" class="form-control" id="exampleInputEmail1"  placeholder=" Jumlah Barang">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Update</label>
                        <input type="date" name="tgl_update" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Update">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
