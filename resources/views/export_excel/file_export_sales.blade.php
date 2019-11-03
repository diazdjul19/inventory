<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th class="font-weight-bold">NO</th>
                <th class="font-weight-bold">No Invoice</th>
                <th class="font-weight-bold">Nama Customer</th>
                <th class="font-weight-bold">Nama Product</th>
                <th class="font-weight-bold">Harga Per Item</th>
                <th class="font-weight-bold">Jumlah Barang</th>
                <th class="font-weight-bold">Tanggal Dan Waktu Penjualan</th>
                <th class="font-weight-bold">Nominal Pembayaran</th>
                <th class="font-weight-bold">Total Harga</th>
                <th class="font-weight-bold">Jumlah Kembalian</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->no_invoice}}</td>
                    <td>{{$item->customer['name']}}</td>
                    <td>{{$item->product['product_name']}}</td>
                    <td>Rp. {{number_format($item->item_price,2,',','.')}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>Rp. {{number_format($item->payment_nominal,2,',','.')}}</td>
                    <td>Rp. {{number_format($item->total_price,2,',','.')}}</td>
                    <td>Rp. {{number_format($item->return_nominal,2,',','.')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>