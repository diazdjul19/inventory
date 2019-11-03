<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->no_invoice}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item active">
                    <p>{{$data->no_invoice}}</p><br>
                    <p>Dear {{$data->customer->name}}</p>
                </li>
                <li class="list-group-item">
                    <p>Terimakasih Karena Telah Belanja Di Toko Kami, Berikut Ini Detail Belanjaan Anda</p>
                </li>
            </ul>
            <br>
            <ul class="list-group">
                <li class="list-group-item active text-center">Detail Penjualan</li>
                <li class="list-group-item">
                    <table class="table w-100">
                        <tr>
                            <th>No Invoice</th>
                            <td>{{$data->no_invoice}}</td>
                        </tr>
                        <tr>
                            <th>Nama Customer</th>
                            <td>{{$data->customer->name}}</td>
                        </tr>
                        <tr>
                            <th>Nama Item (Item ID)</th>
                            <td>{{$data->product->product_name}}</td>
                        </tr>
                        <tr>
                            <th>Harga Per Item</th>
                            <td>Rp. {{number_format($data->item_price,2,',','.')}}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Barang</th>
                            <td>{{$data->qty}}</td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>Rp. {{number_format($data->total_price,2,',','.')}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal & Waktu Penjualan</th>
                            <td>{{$data->created_at}}</td>
                        </tr>
                    </table>
                </li>
            </ul>

            <br>

            <ul class="list-group">
                <li class="list-group-item active text-center">Detail Pembayaran</li>
                <li class="list-group-item">
                    <table class="table w-100">
                        <tr>
                            <th>Nominal Pembayaran</th>
                            <td>Rp. {{number_format($data->payment_nominal,2,',','.')}}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Kembalian</th>
                            <td>Rp. {{number_format($data->return_nominal,2,',','.')}}</td>
                        </tr>
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