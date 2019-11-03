@extends('layouts.master-admin ')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <h1 class="mb-3">Edit Stock</h1>   
                <form action="{{route('stock.update', $data->id)}}" method="POST">
                    {{method_field('put')}}
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Product ID</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="product_id">
                            <optgroup label="Product Lama">
                                <option value="{{$data->product->id}}">{{$data->product->product_name}}</option>
                            </optgroup>   
                            <optgroup label="Kategori Baru"> 
                                @foreach ($product as $item)
                                        <option value="{{$item->id}}">{{$item->product_name}}</option>
                                @endforeach
                            </optgroup> 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Barang</label>
                        <input type="number" name="jml_barang" class="form-control" id="exampleInputEmail1"  placeholder=" Jumlah Barang" value="{{$data->jml_barang}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Update</label>
                        <input type="date" name="tgl_update" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Update" value="{{$data->tgl_update}}">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
