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
                <th class="font-weight-bold">No</th>
                <th class="font-weight-bold">Category</th>
                <th class="font-weight-bold">Kode Product</th>
                <th class="font-weight-bold">Nama Product</th>
                <th class="font-weight-bold">Jumlah Stock</th>
                <th class="font-weight-bold">Satuan</th>
                <th class="font-weight-bold">Harga Per Barang</th>
                <th class="font-weight-bold">Foto Product</th>
                <th class="font-weight-bold">Tgl Registrasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->category->category_name}}</td>
                    <td>{{$d->product_code}}</td>
                    <td>{{$d->product_name}}</td>
                    <td class="text-center">{{$d->stock}}</td>
                    <td>{{$d->satuan}}</td>
                    <td>Rp. {{number_format($d->item_price,'2',',','.')}}</td>
                    <td>{{$d->product_photo}}</td>
                    <td>{{$d->registration_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>