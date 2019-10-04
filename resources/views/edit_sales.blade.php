@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <h1 class="mb-3">Edit Data Penjualan</h1>   
                <form action="{{route('sales.update', $data->id)}}" method="POST">
                    {{method_field('put')}}
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Invoice</label>
                        <input type="number" name="no_invoice" class="form-control" id="exampleInputEmail1"  placeholder="Invoice Number" value="{{$data->no_invoice}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Item (Item ID)</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="item_id">
                        <option value="{{$data->product->id}}">{{$data->product->product_name}}</option>
                        @foreach ($product as $item)
                            <option value="{{$item->id}}">{{$item->product_name}}</option>
                        @endforeach
                        </select>
                    </div> 

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Customer</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="customers">
                        <option value="{{$data->customer->id}}">{{$data->customer->name}}</option>
                        @foreach ($customer as $item)
                            <option value="{{$item->id}}"> {{$item->name}} </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="text" name="qty" class="form-control" id="exampleInputEmail1"  placeholder="Quantity" value="{{$data->quantity}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
