@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-3">Tambah Pembelian</h1>   
                <form action="{{route('buying.store')}}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Invoice</label>
                        <input type="number" name="no_invoice" class="form-control" id="exampleInputEmail1"  placeholder="No Invoice">
                    </div>

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

                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga</label>
                        <input type="number" name="total_price" class="form-control" id="exampleInputEmail1"  placeholder="Total Price">
                    </div>

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
        </div> --}}

        <div class="col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <h4 class="card-title">Create Buying</h4>
                    <br> 
                    <form action="{{route('buying.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="nama_supplier">Nama Supplier</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="nama_supplier" name="supplier">
                                            <option>-- Pilih Supplier --</option>
                                                @foreach ($data_supplier as $item)
                                                    <option value="{{$item->id}}">{{$item->supplier_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="company_name">Nama Perusahaan</label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="company" class="form-control" id="company_name"  placeholder="company" autocomplete="off" readonly >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="email_supplier">Email Perusahaan</label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="supplier_email" class="form-control" id="email_supplier"  placeholder="Supplier Email" autocomplete="off" readonly >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="item_id">Nama Item</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="item_id" name="item_id">
                                            <option>-- Pilih Nama Item --</option>
                                                @foreach ($data_product as $item)
                                                    <option value="{{$item->id}}">{{$item->product_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="item_price">Harga Per Item ( Rp. )</label>                                   
                                    <div class="col-sm-9">
                                        <input type="number" name="item_price" class="form-control" id="harga_per_item"  placeholder="Item Price">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="diskon_harga">Jml Pembelian Barang</label>
                                    <div class="col">
                                        <div id="the-basics">
                                            <input type="number" name="qty" class="form-control" id="jumlah_barang"  placeholder="Quantity ">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="bloodhound">
                                            <input type="text" readonly  name="satuan" class="form-control" id="satuan_barang"  placeholder="Satuan Barang ">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="diskon_harga">Masukan Diskon ( % )</label>
                                    <div class="col-sm-9">
                                    <input type="number" name="discounts_item"  class="form-control" id="diskon_harga"  placeholder="Discount Item" autocomplete="off" value="0" >
                                    </div>
                                </div>
                                


                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                
                            </div>

                            <div class="col-md-4">
                                <div class="row ml-5">
                                    <ul class="list-group">
                                        <li class="list-group-item active "></li>

                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="total_harga"> Total Harga Barang ( Rp. )</label>
                                                <input readonly  type="number" name="total_price_item" class="form-control" id="total_harga_item"  placeholder="Total Price Item ">      
                                            </div>

                                            <div class="form-group">
                                                <label for="biaya_antar">Biaya Antar ( Rp. )</label>
                                                <input type="number" name="delivery_fee" class="form-control" id="biaya_antar"  placeholder="Delivery Fee" value="0">                                                
                                            </div>
                                        </li>                                                  
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="exampleInputEmail1"> Total Semua Harga ( Rp. )</label>
                                                <input readonly  type="number" name="total_all_price" class="form-control" id="total_semua_harga"  placeholder="Total All Price" autocomplete="off">
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
    <script>

        $('#item_id').on('change', function(){
            var id = $(this).children('option:selected').val();

            $.ajax({
            url: '/satuan_barang',
            method : 'get',
            type : 'json',
            data: {
                id: id
            },
            success: function (response) {
                // console.log(response);
                $('#satuan_barang').val(response.satuan);
            },
            error: function (response) {
                console.log(response);
            }

            })
        })

        $('#nama_supplier').on('change', function(){
            var id = $(this).children('option:selected').val();

            $.ajax({
                url: '/get_supplier',
                method:'get',
                type:'json',
                data:{
                    id: id
                },

                success: function(response){
                    // console.log(response);
                    $('#email_supplier').val(response.email);
                    $('#company_name').val(response.legal_name)
                },

                error: function (response) {
                console.log(response);
                }


            })
        })


        // $('#jumlah_barang'). on('keyup', function(){
        //     var harga_per_item = $('#harga_per_item').val();
        //     var jumlah_barang = $(this).val();

        //     var total_harga_item = harga_per_item * jumlah_barang;
        //     // var total_semua_harga = harga_per_item * jumlah_barang;

        //     $('#total_harga_item').val(total_harga_item);
        //     $('#total_semua_harga').val(total_harga_item);

        // })
            

        $('#jumlah_barang'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var biaya_antar = $('#biaya_antar').val();
            var diskon_harga = $('#diskon_harga').val();
            var jumlah_barang = $(this).val();

            var total_harga_item = harga_per_item * jumlah_barang;

            var total_harga_diskon = (harga_per_item * jumlah_barang) * diskon_harga / 100; 
            var total_harga_item = (harga_per_item * jumlah_barang) - total_harga_diskon ;

            $('#total_harga_item').val(total_harga_item);


            // var total_harga_item = harga_per_item * jumlah_barang;
            var total_semua_harga = parseInt(biaya_antar) + parseInt(total_harga_item);
            
            if (isNaN(total_semua_harga)) {
                total_semua_harga = 0;
            }
            console.log(total_semua_harga);
            $('#total_semua_harga').val(total_semua_harga);

        })


        // hpi cara 1
        // $('#harga_per_item'). on('keyup', function(){
        //     var jumlah_barang = $('#jumlah_barang').val();
        //     var harga_per_item = $(this).val();

        //     var total_harga_item = jumlah_barang * harga_per_item ;
        //     // var total_semua_harga = harga_per_item * jumlah_barang;

        //     $('#total_harga_item').val(total_harga_item);
        //     $('#total_semua_harga').val(total_harga_item);

        // })

            // hpi cara 2
            $('#harga_per_item'). on('keyup', function(){
                var jumlah_barang = $('#jumlah_barang').val();
                var biaya_antar = $('#biaya_antar').val();
                var diskon_harga = $('#diskon_harga').val();
                var harga_per_item = $(this).val();
                
                // mendapatkan diskon & total harga item
                var total_harga_item = jumlah_barang * harga_per_item ;
                var total_harga_diskon = (harga_per_item * jumlah_barang) * diskon_harga / 100; 
                var total_harga_item = (harga_per_item * jumlah_barang) - total_harga_diskon ;
                $('#total_harga_item').val(total_harga_item);

                // mendapatkan kembalian
                var total_semua_harga = parseInt(biaya_antar) + parseInt(total_harga_item);

                if (isNaN(total_semua_harga)) {
                    total_semua_harga = 0;
                }
                console.log(total_semua_harga);
                $('#total_semua_harga').val(total_semua_harga);


            })


        $('#biaya_antar'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var jumlah_barang = $('#jumlah_barang').val();
            var biaya_antar = $(this).val();

            // setelah ada diskon
            var diskon_harga = $('#diskon_harga').val();            
            var total_harga_diskon = (harga_per_item * jumlah_barang) * diskon_harga / 100; 
            var total_harga_item = (harga_per_item * jumlah_barang) - total_harga_diskon ;

            // var total_harga_item = harga_per_item * jumlah_barang;
            var total_semua_harga = parseInt(biaya_antar) + parseInt(total_harga_item);

            if (isNaN(total_semua_harga)) {
                total_semua_harga = 0;
            }
            console.log(total_semua_harga);
            $('#total_semua_harga').val(total_semua_harga);

        })


        // diskon harga cara 1
        // $('#diskon_harga'). on('keyup', function(){
        //     var harga_per_item = $('#harga_per_item').val();
        //     var jumlah_barang = $('#jumlah_barang').val();
        //     var biaya_antar = $('#biaya_antar').val();

        //     var diskon_harga = $(this).val();
        //     var total_harga_diskon = (harga_per_item * jumlah_barang) * diskon_harga / 100; 
        //     var total_harga_item = (harga_per_item * jumlah_barang) - total_harga_diskon;
            
        //     console.log(total_harga_item);
        //     $('#total_harga_item').val(total_harga_item);

        //     console.log(total_harga_item);
        //     $('#total_semua_harga').val(total_harga_item);

        // })

        // diskon harga cara 2
        $('#diskon_harga'). on('keyup', function(){
            var harga_per_item = $('#harga_per_item').val();
            var jumlah_barang = $('#jumlah_barang').val();
            var biaya_antar = $('#biaya_antar').val();
            var diskon_harga = $(this).val();

            // mendapatkan diskon & total harga item
            var total_harga_diskon = (harga_per_item * jumlah_barang) * diskon_harga / 100; 
            var total_harga_item = (harga_per_item * jumlah_barang) - total_harga_diskon;
            console.log(total_harga_item);
            $('#total_harga_item').val(total_harga_item);

            // total_kembalian-harga_biaya-antar_bulak-balik = tkhbabb
            var tkhbabb = parseInt(biaya_antar) + parseInt(total_harga_item);
            console.log(tkhbabb);
            $('#total_semua_harga').val(tkhbabb);

        })



    </script>
@endpush
