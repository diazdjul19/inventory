<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item active">
                    <p>Hallo, Berikut Ini Merupakan Data Penjualan Selama Ini</p>
                </li>
            </ul>
            <br>
            <ul class="list-group">
                <li class="list-group-item active text-center">Detail Penjualan</li>
                <li class="list-group-item">
                    <table class="table w-100">
                        <tr>
                            <th>No Invoice</th>
                            <th>Nama Customer</th>
                            <th>Email Customer</th>
                            <th>Nama Item (Item ID)</th>
                            <th>Harga Per Item</th>
                            <th>Jumlah Barang</th>
                            <th>Diskon Barang</th>
                            <th>Tanggal & Waktu Penjualan</th>
                            <th>Nominal Pembayaran</th>
                            <th>Total Harga</th>
                            <th>Jumlah Kembalian</th>
                        </tr>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{$d->no_invoice}}</td>
                            <td>{{$d->customer->name}}</td>
                            <td>{{$d->customer_email}}</td>
                            <td>{{$d->product->product_name}}</td>
                            <td>Rp. {{number_format($d->item_price,2,',','.')}}</td>
                            <td>{{$d->qty}} {{$d->satuan}}</td>
                            <td>{{$d->discounts_item}}%</td>
                            <td>{{$d->created_at}}</td>
                            <td>Rp. {{number_format($d->payment_nominal,2,',','.')}}</td>
                            <td>Rp. {{number_format($d->total_price,2,',','.')}}</td>
                            <td>Rp. {{number_format($d->return_nominal,2,',','.')}}</td>
                        </tr>
                        @endforeach

                    </table>
                </li>
            </ul>            
        </div>
    </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>