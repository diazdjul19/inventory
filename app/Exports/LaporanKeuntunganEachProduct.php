<?php

namespace App\Exports;
use App\Models\MsProduct;
use App\Models\MsSales;
use App\Models\MsBuying;


// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class LaporanKeuntunganEachProduct implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View
    {   

        $product = MsProduct::all();
        
        // mengambil data dari URL
        $data = url()->full();
        $dari = \Str::substr($data, 123,10 );
        $sampai = \Str::substr($data, 156 );
        $nama_product =  \Str::substr($data, 147, 1 );
        $data_dari_sampai = "Dari Tanggal " .date('d M Y', strtotime($dari)). " - " ."Sampai Tanggal " .date('d M Y', strtotime($sampai));
        
        // Proses
        $jumlah_uang_with_name_product = \DB::table('ms_products')
                    ->join('ms_sales', 'ms_sales.item_id', '=', 'ms_products.id')
                    ->where('item_id',[$nama_product])
                    ->whereBetween('ms_sales.created_at', [$dari,$sampai])
                    ->get();

        $total_uang_with_name_product = \DB::table('ms_sales')
                    ->where('item_id',[$nama_product])
                    ->whereBetween('created_at', [$dari,$sampai])
                    ->sum('total_price'); 
        
        //Mencari keuntungan tiap product 
        $data1 = MsSales::where('item_id',[$nama_product])->value('item_price');
        $data2 = MsBuying::where('item_id',[$nama_product])->orderBy('id', 'DESC')->value('item_price');  
        $data3 = MsSales::where('item_id',[$nama_product])->whereBetween('created_at', [$dari,$sampai])->sum('qty');
        $data_untung_with_product = ($total_uang_with_name_product) - ($data2 * $data3);
        

        return view('export_excel.file_export_keuntungan' , compact('jumlah_uang_with_name_product','total_uang_with_name_product','data_untung_with_product','product', 'data_dari_sampai'));
        

    }
}
