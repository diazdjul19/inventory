<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel</title>
</head>
<body>


            {{-- Dengan Product --}}
            @if (isset($jumlah_uang_with_name_product))
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-light table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <td><b>Optional : Each Product</b></td>
                                </tr>
                                <tr>
                                    <td><b>Data {{$data_dari_sampai}}</b></td>
                                </tr>

                                <tr></tr>
                                
                                <tr>
                                    <th class="font-weight-bold text-center"><b>No</b></th>
                                    <th class="font-weight-bold"><b>No Invoice</b></th>
                                    <th class="font-weight-bold"><b>Nama Product</b></th>
                                    <th class="font-weight-bold"><b>Harga Per Barang</b></th>
                                    <th class="font-weight-bold"><b>Jumlah</b></th>
                                    <th class="font-weight-bold"><b>Diskon</b></th>
                                    <th class="font-weight-bold"><b>Tanggal</b></th>
                                    <th class="font-weight-bold"><b>Jumlah Harga</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jumlah_uang_with_name_product as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$item->no_invoice}}</td>
                                        <td>{{$item->product_name}}</td>
                                        <td>Rp. {{number_format($item->item_price,2,',','.')}}</td>
                                        <td class="text-center">{{$item->qty}} {{$item->satuan}}</td>
                                        <td class="text-center">{{$item->discounts_item}}%</td>
                                        <td>{{date('d M Y', strtotime($item->created_at))}}</td>
                                        <td>Rp. {{number_format($item->total_price,2,',','.')}}</td>
                                    </tr>
                                @endforeach
                                    <tr></tr>
                                    <tr class="table-success">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><i>Total Omset :</i></b></td>
                                        <td><b><i>Rp. {{number_format($total_uang_with_name_product,2,',','.')}}</i></b></td>
                                    </tr>
                                    <tr class="table-info">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><i>Total Keuntungan :</i></b></td>
                                        <td><b><i>Rp. {{number_format($data_untung_with_product,2,',','.')}}</i></b></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif





            {{-- Tidak dengan product (All) --}}
            @if (isset($jumlah_uang_not_with_product))
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-light table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <td><b>Optional : ALL Product</b></td>
                                </tr>
                                <tr>
                                    <td><b>Data {{$data_dari_sampai}}</b></td>
                                </tr>

                                <tr></tr>

                                <tr>
                                    <th class="font-weight-bold text-center"><b>No</b></th>
                                    <th class="font-weight-bold"><b>No Invoice</b></th>
                                    <th class="font-weight-bold"><b>Nama Product</b></th>
                                    <th class="font-weight-bold"><b>Harga Per Barang</b></th>
                                    <th class="font-weight-bold"><b>Jumlah</b></th>
                                    <th class="font-weight-bold"><b>Diskon</b></th>
                                    <th class="font-weight-bold"><b>Tanggal</b></th>
                                    <th class="font-weight-bold"><b>Jumlah Harga</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jumlah_uang_not_with_product as $item)
                                    <tr>
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
                                    <tr></tr>
                                    <tr class="table-success">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total Omset :</b></td>
                                        <td><b><i>Rp. {{number_format($total_harga_penjualan,2,',','.')}}</i></b></td>
                                    </tr>
                                    <tr class="table-info">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total Keuntungan :</b></td>
                                        <td><b><i>Rp. {{number_format($data_untung_not_with_product,2,',','.')}}</i></b></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
</body>
</html>




