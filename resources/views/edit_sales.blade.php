@extends('layouts.master-admin')

@section('wrapper')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-3">Edit Data Penjualan</h1>   
                <form action="{{route('sales.update', $data->id)}}" method="POST">
                    {{method_field('put')}}
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Item (Item ID)</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="item_id">
                        <optgroup label="Product Lama">    
                            <option value="{{$data->product->id}}">{{$data->product->product_name}}</option>
                        </optgroup>
                        <optgroup label="Product Baru">    
                            @foreach ($product as $item)
                                <option value="{{$item->id}}">{{$item->product_name}}</option>
                            @endforeach
                        </optgroup>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Customer</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="customers">
                        <optgroup label="Customer Lama">   
                            <option value="{{$data->customer->id}}">{{$data->customer->name}}</option>
                        </optgroup>
                        <optgroup label="Customer Baru">
                            @foreach ($customer as $item)
                                <option value="{{$item->id}}"> {{$item->name}} </option>
                            @endforeach
                        </optgroup>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="qty" class="form-control" id="exampleInputEmail1"  placeholder="Quantity" value="{{$data->qty}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Per Item</label>
                        <input type="number" name="item_price" class="form-control" id="exampleInputEmail1"  placeholder="item_price" value="{{$data->item_price}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nominal Pembayaran(Rp)</label>
                        <input type="number" name="payment_nominal" class="form-control" id="exampleInputEmail1"  placeholder="payment_nominal" value="{{$data->payment_nominal}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nominal Kembalian(Rp)</label>
                        <input type="number" name="return_nominal" class="form-control" id="exampleInputEmail1"  placeholder="return_nominal" value="{{$data->return_nominal}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <h4 class="card-title">Create Sales</h4>
                    <br> 
                    <form action="{{route('sales.update', $data->id)}}" method="POST">
                        {{method_field('put')}}
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleFormControlSelect1">Customer</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleFormControlSelect1" name="customers">
                                            <optgroup label="Customer Lama">   
                                                <option value="{{$data->customer->id}}">{{$data->customer->name}}</option>
                                            </optgroup>
                                            <optgroup label="Customer Baru">
                                                @foreach ($customer as $item)
                                                    <option value="{{$item->id}}"> {{$item->name}} </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="exampleFormControlSelect1">Nama Item (Item ID)</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleFormControlSelect1" name="item_id">
                                            <optgroup label="Product Lama">    
                                                <option value="{{$data->product->id}}">{{$data->product->product_name}}</option>
                                            </optgroup>
                                            <optgroup label="Product Baru">    
                                                @foreach ($product as $item)
                                                    <option value="{{$item->id}}">{{$item->product_name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Harga Per Item (Rp)</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="item_price" class="form-control" id="harga_per_item"  placeholder="item_price" autocomplete="off" value="{{$data->item_price}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Jumlah Barang</label>
                                    <div class="col-sm-9">
                                    <input type="number" name="qty" class="form-control" id="quantity"  placeholder="Quantity" autocomplete="off" value="{{$data->qty}}">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                
                            </div>

                            <div class="col-md-4">
                                <div class="row ml-5">
                                    <ul class="list-group">
                                        <li class="list-group-item active ">Pebayaran</li>
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="nominal_pembayaran">Nominal Pembayaran (Rp)</label>
                                                <input type="text" name="payment_nominal" class="form-control" id="nominal_pembayaran"  placeholder="payment_nominal" autocomplete="off" value="{{$data->payment_nominal}}">
                                            </div>   
                                        </li>

                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label for="total_harga">Total Harga (Rp)</label>
                                                <input type="number" name="total_price" class="form-control" id="total_harga"  placeholder="total_price" autocomplete="off" value="{{$data->total_price}}">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold" for="exampleInputEmail1">Nominal Kembalian (Rp)</label>
                                                <input type="number" name="return_nominal" class="form-control" id="nominal_kembalian"  placeholder="return_nominal" autocomplete="off" value="{{$data->return_nominal}}">
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection


@push('script')
    
    {{-- pemisah titik form --}}
    {{-- <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script type="text/javascript">
            // Format mata uang.
            $( '#nominal_pembayaran' ).mask('000.000.000', {reverse: true});
    </script> --}}



    {{-- Ajax create --}}
    <script>
        
        // // harga per item
        // $('#item-id').on('change', function(){
        //     var id = $(this).children('option:selected').val();

        //     $.ajax({
        //     url: '/get_item',
        //     method : 'get',
        //     type : 'json',
        //     data: {
        //         id: id
        //     },
        //     success: function (response) {
        //         // console.log(response);
        //         $('#harga_per_item').val(response.item_price);
        //     },
        //     error: function (response) {
        //         console.log(response);
        //     }

        //     })
        // })


        // 
        $('#nominal_pembayaran'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var quantity = $('#quantity').val();
            var nominal_pembayaran = $(this).val();
            var total_harga = harga_per_item * quantity;
            var nominal_kembalian = parseInt(nominal_pembayaran) - parseInt(total_harga);

            if (isNaN(nominal_kembalian)) {
                nominal_kembalian = 0;
            }
            console.log(nominal_kembalian);
            $('#nominal_kembalian').val(nominal_kembalian);

        })

        $('#quantity'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var quantity = $(this).val();

            var total_harga = harga_per_item * quantity;
            $('#total_harga').val(total_harga);
        })



        
    </script>
@endpush
