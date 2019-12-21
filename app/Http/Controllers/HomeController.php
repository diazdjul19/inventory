<?php

namespace App\Http\Controllers;
use App\Models\MsProduct;
use App\Models\MsCategory;
use App\Models\MsCustomer;
use App\Models\MsSupplier;
use App\Models\MsSales;
use App\Models\MsBuying;
use App\User;
use Carbon\Carbon;
// use Auth;

// use RealRashid\SweetAlert\Facades\Alert;

// export excel
use App\Exports\LaporanKeuntunganEachProduct;
use App\Exports\LaporanKeuntunganAllProduct;

use Maatwebsite\Excel\Facades\Excel;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.toast_success
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jumlah_data_Product = count(MsProduct::all());
        $jumlah_data_Customer = count(MsCustomer::all());
        $jumlah_data_Sales = count(MsSales::all());
        $jumlah_data_Buying = count(MsBuying::all());


        $total_keuntungan = MsSales::get()->sum('total_price');
        
        // keuntungan
        return view('home', compact('jumlah_data_Product','jumlah_data_Customer','jumlah_data_Sales','jumlah_data_Buying', 'total_keuntungan'));
    }


    public function keuntungan_kerugian(){
        // $data = MsSales::all();
        // // $data_penjualan_untung = MsSales::get()->where('item_id')->sum('total_price');
        // // $data_pembelian_untung = MsBuying::get()->sum('total_all_price'); 
        // // $asd =  MsBuying::get()->sum('qty'); 
        
        $product = MsProduct::all();
        return view('keuntungan_kerugian.keuntungan_toko', compact('product'));
    }

    public function cari_laporan_untung(Request $request){

        // data url untuk pdf
        $data_url = $request->fullUrl();
        $data_url = \Str::substr($data_url, 42);
        

        $product = MsProduct::all();
        $this->validate($request,[
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $nama_product = $request->nama_product;
        $dari = date('Y-m-d',strtotime($request->input('dari')));
        $sampai = date('Y-m-d',strtotime($request->input('sampai')."+1 day"));

        if ($nama_product > 0) {

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
            
            return view('keuntungan_kerugian.keuntungan_toko', compact('jumlah_uang_with_name_product','total_uang_with_name_product','data_untung_with_product','product', 'data_url'));

        } else {
            
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


            return view('keuntungan_kerugian.keuntungan_toko', compact('jumlah_uang_not_with_product', 'total_harga_penjualan','data_untung_not_with_product', 'product', 'data_url'));
            
        }
    
    }








    // mendapatkan code acak untuk download
    private function code_download($length = 10)
    {
        $char = '0123456789';
        $char_length = strlen($char);
        $random_string = '';
        for($i=0; $i < $length; $i++){
            $random_string .= $char[rand(0,$char_length-1)];
        }
        return $random_string;
    }

    // function untuk download laporan keuntungan to PDF
    public function download_laporan_pdf_keuntungan(Request $request){

        $product = MsProduct::all();

        // membuat validasi jikan (dari,sampai) belum di isi maka tidak akan berjalan
        $this->validate($request,[
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        // menerima request dari url
        $nama_product = $request->nama_product;
        $dari = date('Y-m-d',strtotime($request->input('dari')));
        $sampai = date('Y-m-d',strtotime($request->input('sampai')."+1 day"));
        
        // mendapatkan code acak dari code_download yg nanti akan di compact untuk view
        $laporan_code = 'LaporanCode-'.$this->code_download(10);

        // script untuk mendapatkan data dari - sampai yg nantinya akan di compact untuk view
        $data_dari_sampai = "Dari Tanggal " .date('d M Y', strtotime($request->input('dari'))). " - " ."Sampai Tanggal " .date('d M Y', strtotime($request->input('sampai')));
        

        if ($nama_product > 0) {

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
            // dd($data1);
            $data_untung_with_product = ($total_uang_with_name_product) - ($data2 * $data3);
            
            $pdf = \PDF::loadView('pdf.download_laporan_keuntungan_with_product',  compact('jumlah_uang_with_name_product','total_uang_with_name_product','data_untung_with_product','product','laporan_code', 'data_dari_sampai'))->setPaper('legal')->setOrientation('landscape');

            return $pdf->download('LaporanCode_WithProduct-'.$laporan_code.'.pdf');


        } else {
            
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

            $pdf = \PDF::loadView('pdf.download_laporan_keuntungan_not_with_product', compact('jumlah_uang_not_with_product', 'total_harga_penjualan','data_untung_not_with_product','laporan_code', 'product', 'data_dari_sampai'))->setPaper('legal')->setOrientation('landscape');

            return $pdf->download('LaporanCode_ALL-'.$laporan_code.'.pdf');

            
        }
    }



    public function export_laporan_excel_keuntungan_each_product(){

        return Excel::download(new LaporanKeuntunganEachProduct, 'LaporanKeuntungan_EachProduct.xlsx');
        
    }

    public function export_laporan_excel_keuntungan_all_product(){

        return Excel::download(new LaporanKeuntunganAllProduct, 'LaporanKeuntungan_AllProduct.xlsx');
        
    }

}
