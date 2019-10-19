@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-3">Tambah Data Penjualan</h1>   
                <form action="{{route('sales.store')}}" method="POST">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">No Invoice</label>
                        <input type="number" name="no_invoice" class="form-control" id="exampleInputEmail1"  placeholder="Invoice Number" >
                    </div> --}}

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Item (Item ID)</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="item_id">
                        <option>-- Pilih Item --</option>
                        @foreach ($product as $item)
                            <option value="{{$item->id}}">{{$item->product_name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Customer</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="customers">
                        <option>-- Pilih Nama Customer --</option>
                        @foreach ($customer as $cos)
                            <option value="{{$cos->id}}"> {{$cos->name}} </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="qty" class="form-control" id="exampleInputEmail1"  placeholder="Quantity">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Per Item</label>
                        <input type="number" name="item_price" class="form-control" id="exampleInputEmail1"  placeholder="item_price">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nominal Pembayaran(Rp)</label>
                        <input type="number" name="payment_nominal" class="form-control" id="exampleInputEmail1"  placeholder="payment_nominal">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nominal Kembalian(Rp)</label>
                        <input type="number" name="return_nominal" class="form-control" id="exampleInputEmail1"  placeholder="return_nominal">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
