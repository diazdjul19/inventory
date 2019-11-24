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
            <p>Kepada {{$data->name_supplier->supplier_name}}</p>
            <p>Terimakasih Karena Telah Menjadi Supplier Untuk Toko "INVENTORY" Kami.</p>
            <p>Berikut Ini Adalah Detail Penjualan Anda Kepada Kami :</p>
    
            <br>    
            <table >
                <tr style="text-align:left;">
                    <th>
                        <h3>Detail Penjualan</h3>            
                    </th>
                </tr>
                <tr style="text-align:left;">
                    <th>No Invoice</th>
                    <th>:</th>
                    <td>{{$data->no_invoice}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Nama Supplier</th>
                    <th>:</th>
                    <td>{{$data->name_supplier->supplier_name}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Name Perusahaan</th>
                    <th>:</th>
                    <td>{{$data->company}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Email Perusahaan</th>
                    <th>:</th>
                    <td>{{$data->supplier_email}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Nama Product</th>
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
                    <td>{{$data->qty}} {{$data->satuan}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Diskon Barang</th>
                    <th>:</th>
                    <td>{{$data->discounts_item}}%</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Tanggal & Waktu Penjualan</th>
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
                    <th>Total Harga</th>
                    <th>:</th>
                    <td>Rp. {{number_format($data->total_price_item,2,',','.')}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Biaya Antar</th>
                    <th>:</th>
                    <td>Rp. {{number_format($data->delivery_fee,2,',','.')}}</td>
                </tr>
                <tr style="text-align:left;">
                    <th>Total Semua Harga</th>
                    <th>:</th>
                    <td>Rp. {{number_format($data->total_all_price,2,',','.')}}</td>
                </tr>
            </table>

</body>
</html>