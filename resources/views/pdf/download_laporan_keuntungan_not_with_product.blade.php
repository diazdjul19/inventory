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
                    <p>{{$laporan_code}}</p>
                    <p>Kepada Bapak Diaz Djuliansyah</p>
                    <p>Berikut Ini Merupakan Hasil Keuntungan Toko Inventory Anda : </p>
                </li>
            </ul>
            <br>
            <ul class="list-group">
                <li class="list-group-item active">
                    <p>Detail Penjualan Barang : </p>
                    <p>{{$data_dari_sampai}}</p>
                </li>
                <li class="list-group-item">
                    <table class="table w-100">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Nama Product</th>
                            <th>Harga Per Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Jumlah Dikon</th>
                            <th>Tanggal</th>
                            <th>Jumlah Harga</th>
                        </tr>
                        @foreach ($jumlah_uang_not_with_product as $item)
                            <tr >
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->no_invoice}}</td>
                                <td>{{$item->product_name}}</td>
                                <td>Rp. {{number_format($item->item_price,2,',','.')}}</td>
                                <td>{{$item->qty}} {{$item->satuan}}</td>
                                <td>{{$item->discounts_item}}%</td>
                                <td>{{date('d M Y', strtotime($item->created_at))}}</td>
                                <td>Rp. {{number_format($item->total_price,2,',','.')}}</td>
                            </tr>
                        @endforeach
                        
                        <tr class="table-success">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Total Omset       :</b></td>
                            <td><b><i>Rp. {{number_format($total_harga_penjualan,2,',','.')}}</i></b></td>
                        </tr>
                        <tr class="table-info">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Total Keuntungan  :</b></td>
                            <td><b><i>Rp. {{number_format($data_untung_not_with_product,2,',','.')}}</i></b></td>
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