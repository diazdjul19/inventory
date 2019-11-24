<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->no_invoice}}</title>    
</head>
<body>
    
            <p>{{$data->no_invoice}}</p><br>
            <p>Kepada {{$data->customer->name}}</p>
            <p>Terimakasih Karena Telah Belanja Di Toko "INVENTORY" Kami.</p>
            <p>Berikut Ini Adalah Detail Pembelian Anda :</p>
            <p></p>
    
            <br>    
            <table >
                <tr style="text-align:left;">
                    <th>
                        <h3>Detail Pembelian</h3>            
                    </th>
                </tr>
                <tr style="text-align:left;">
                    <th>No Invoice</th>
                    <th>:</th>
                    <td>{{$data->no_invoice}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Nama Customer</th>
                    <th>:</th>
                    <td>{{$data->customer->name}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Email Customer</th>
                    <th>:</th>
                    <td>{{$data->customer_email}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Nama Item (Item ID)</th>
                    <th>:</th>
                    <td>{{$data->product->product_name}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Harga Per Item</th>
                    <th>:</th>
                    <td>Rp. {{number_format($data->item_price,2,',','.')}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Jumlah Barang</th>
                    <th>:</th>
                    <td>{{$data->qty}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Satuan Barang</th>
                    <th>:</th>
                    <td>{{$data->satuan}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Diskon Barang</th>
                    <th>:</th>
                    <td>{{$data->discounts_item}}%</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Tanggal & Waktu Pembelian</th>
                    <th>:</th>
                    <td>{{$data->created_at}}</td>
                </tr>
            </table>

            <br>

            <table>
                <tr style="text-align:left;">
                    <th>
                        <h3>Detail Pembayaran</h3>
                    </th>
                </tr>
                
                <tr style="text-align:left;">
                    <th>Nominal Pembayaran</th>
                    <th>:</th>
                    <td>Rp. {{number_format($data->payment_nominal,2,',','.')}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Total Harga</th>
                    <th>:</th>
                    <td>Rp. {{number_format($data->total_price,2,',','.')}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Jumlah Kembalian</th>
                    <th>:</th>
                    <td>Rp. {{number_format($data->return_nominal,2,',','.')}}</td>
                </tr>
            </table>

</body>
</html>