@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <h4 class="card-title">Create Sales</h4>
                    <br> 
                    <form action="{{route('sales.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleFormControlSelect1">Nama Customer</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="nama_customer" name="customers">
                                            <option>-- Pilih Nama Customer --</option>
                                            @foreach ($customer as $cos)
                                                <option value="{{$cos->id}}"> {{$cos->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="email_customer">Email Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="customer_email" readonly class="form-control" id="email_customer"  placeholder="Customer Email" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="exampleFormControlSelect1">Nama Item (Item ID)</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="item-id" name="item_id">
                                            <option>-- Pilih Item --</option>
                                            @foreach ($product as $item)
                                                <option value="{{$item->id}}">{{$item->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Harga Per Item (Rp)</label>
                                    <div class="col-sm-9">
                                        <input type="number"  name="item_price" readonly class="form-control" id="harga_per_item"  placeholder="item_price" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Jumlah Barang</label>
                                    <div class="col-sm-9">
                                    <input type="number" name="qty" class="form-control" id="quantity"  placeholder="Quantity" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="satuan_barang">Satuan Barang</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="satuan" readonly class="form-control" id="satuan_barang"  placeholder="Satuan Barang" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="diskon_harga">Masukan Diskon ( % )</label>
                                    <div class="col-sm-9">
                                    <input type="number" name="discounts_item"  class="form-control" id="diskon_harga"  placeholder="Discount Item" autocomplete="off" value="0">
                                    </div>
                                </div>
                                
                                {{-- <input type="datetime-local" name="" id=""> --}}
                                

                                
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                
                            </div>

                            <div class="col-md-4">
                                <div class="row ml-5">
                                    <ul class="list-group">
                                        <li class="list-group-item active ">Pebayaran</li>
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="nominal_pembayaran">Nominal Pembayaran (Rp)</label>
                                                <input type="text" name="payment_nominal" class="form-control" id="nominal_pembayaran"  placeholder="payment_nominal" autocomplete="off">
                                            </div>   
                                        </li>

                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label for="total_harga">Total Harga (Rp)</label>
                                                <input type="number" name="total_price" readonly class="form-control" id="total_harga"  placeholder="total_price" autocomplete="off">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold" for="exampleInputEmail1">Nominal Kembalian (Rp)</label>
                                                <input type="number" name="return_nominal" readonly class="form-control" id="nominal_kembalian"  placeholder="return_nominal" autocomplete="off">
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
        
        //Nama Item -> harga_per_item, Satuan
        $('#item-id').on('change', function(){
            var id = $(this).children('option:selected').val();

            $.ajax({
            url: '/get_item',
            method : 'get',
            type : 'json',
            data: {
                id: id
            },
            success: function (response) {
                // console.log(response);
                $('#harga_per_item').val(response.item_price);
                $('#satuan_barang').val(response.satuan);


            },
            error: function (response) {
                console.log(response);
            }

            })
        })
        //Nama Customer -> customer_email

        $('#nama_customer').on('change', function(){
            var id = $(this).children('option:selected').val();

            $.ajax({
                url: '/get_customer',
                method:'get',
                type:'json',
                data:{
                    id: id
                },

                success: function(response){
                    // console.log(response);
                    $('#email_customer').val(response.email);
                },

                error: function (response) {
                console.log(response);
                }


            })
        })


        // 
    $('#nominal_pembayaran'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var quantity = $('#quantity').val();
            var nominal_pembayaran = $(this).val();
             // var total_harga = harga_per_item * quantity;
            
            //ngambil cara dari diskon 
            var diskon_harga = $('#diskon_harga').val();
            var total_harga_diskon = (harga_per_item * quantity) * diskon_harga / 100; 
            
            var total_harga = (harga_per_item * quantity) - total_harga_diskon ;
            var nominal_kembalian = parseInt(nominal_pembayaran) - parseInt(total_harga);
            if (isNaN(nominal_kembalian)) {
                nominal_kembalian = 0;
            }
            console.log(nominal_kembalian);
            $('#nominal_kembalian').val(nominal_kembalian);
        })

        // qty cara 1
        // $('#quantity'). on('keyup', function(){
        //     var harga_per_item = $('#harga_per_item').val();
        //     var quantity = $(this).val();

        //     var total_harga = harga_per_item * quantity;
        //     $('#total_harga').val(total_harga);
        // })

        // qty cara 2
        $('#quantity'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var quantity = $(this).val();
            var diskon_harga = $('#diskon_harga').val();
            var nominal_pembayaran = $('#nominal_pembayaran').val();


            var total_harga_diskon = (harga_per_item * quantity) * diskon_harga / 100; 
            var total_harga = (harga_per_item * quantity) - total_harga_diskon ;

            // var total_harga = harga_per_item * quantity;
            $('#total_harga').val(total_harga);

            var nominal_kembalian = parseInt(nominal_pembayaran) - parseInt(total_harga);
            if (isNaN(nominal_kembalian)) {
                nominal_kembalian = 0;
            }
            console.log(nominal_kembalian);
            $('#nominal_kembalian').val(nominal_kembalian);
        })

        
        // diskon cara 1
        // $('#diskon_harga'). on('keyup', function(){
        //     var harga_per_item = $('#harga_per_item').val();
        //     var quantity = $('#quantity').val();
        //     var diskon_harga = $(this).val();
        //     var total_harga_diskon = (harga_per_item * quantity) * diskon_harga / 100; 
        //     var total_harga = (harga_per_item * quantity) - total_harga_diskon ;
        //     console.log(total_harga);
        //     $('#total_harga').val(total_harga);
        // })
        
        // diskon cara 2
        $('#diskon_harga'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var quantity = $('#quantity').val();
            var nominal_pembayaran = $('#nominal_pembayaran').val();
            var diskon_harga = $(this).val();

            // mendapatkan diskon
            var total_harga_diskon = (harga_per_item * quantity) * diskon_harga / 100; 
            var total_harga = (harga_per_item * quantity) - total_harga_diskon ;

            // mendapatkan total harga
            console.log(total_harga);
            $('#total_harga').val(total_harga);

            // mendapatkan total kembalian
            var nominal_kembalian = parseInt(nominal_pembayaran) - parseInt(total_harga);
            if (isNaN(nominal_kembalian)) {
                nominal_kembalian = 0;
            }
            console.log(nominal_kembalian);
            $('#nominal_kembalian').val(nominal_kembalian);

            
        })
        


        
    </script>
@endpush