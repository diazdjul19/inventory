@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                <h1 class="mb-3">Tambah Pembelian</h1>   
                <form action="{{route('buying.store')}}" method="POST">
                    @csrf
                    
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">No Invoice</label>
                        <input type="number" name="no_invoice" class="form-control" id="exampleInputEmail1"  placeholder="No Invoice">
                    </div> --}}

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Supplier</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="supplier_id">
                            <option>-- Pilih Supplier --</option>
                                @foreach ($data_supplier as $item)
                                    <option value="{{$item->id}}">{{$item->supplier_name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Item</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="item_id">
                            <option>-- Pilih Nama Item --</option>
                                @foreach ($data_product as $item)
                                    <option value="{{$item->id}}">{{$item->product_name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="qty" class="form-control" id="exampleInputEmail1"  placeholder="Quantity ">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Per Item</label>
                        <input type="number" name="item_price" class="form-control" id="exampleInputEmail1"  placeholder="Item Price">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Antar</label>
                        <input type="number" name="delivery_fee" class="form-control" id="exampleInputEmail1"  placeholder="Delivery Fee">
                    </div>

                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga</label>
                        <input type="number" name="total_price" class="form-control" id="exampleInputEmail1"  placeholder="Total Price">
                    </div> --}}

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Barang</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="item_status">
                        <option value="">-- Pilih Status Barang --</option>
                        <option value="DI Terima">Di Terima</option>
                        <option value="Di Batalkan">Di Batalkan</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
