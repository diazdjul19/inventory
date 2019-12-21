<?php

namespace App\Exports;
use App\Models\MsProduct;
use App\Models\MsSales;
use App\Models\MsBuying;


// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class LaporanKeuntunganAllProduct implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View
    {   

        $product = MsProduct::all();
        
        // mengambil data dari URL
        $data = url()->full();
        $dari = \Str::substr($data, 122, 10 );
        $sampai = \Str::substr($data, 156 );
        $data_dari_sampai = "Dari Tanggal " .date('d M Y', strtotime($dari)). " - " ."Sampai Tanggal " .date('d M Y', strtotime($sampai));
        
        $jumlah_uang_not_with_product = \DB::table('ms_products')
                    ->join('ms_sales', 'ms_sales.item_id', '=', 'ms_products.id')
                    ->whereBetween('ms_sales.created_at', [$dari,$sampai])
                    ->get();
        
        $total_harga_penjualan = \DB::table('ms_sales')
                    ->whereBetween('created_at', [$dari,$sampai])
                    ->sum('total_price');

        $total_harga_pembelian = \DB::table('ms_buyings')
                    ->whereBetween('created_at', [$dari,$sampai])
                    ->sum('total_price_item');
        

        $data_untung_not_with_product = $total_harga_penjualan - $total_harga_pembelian;
        
        return view('export_excel.file_export_keuntungan' , compact('jumlah_uang_not_with_product', 'total_harga_penjualan','data_untung_not_with_product','laporan_code', 'product', 'data_dari_sampai'));
        
    }
}
