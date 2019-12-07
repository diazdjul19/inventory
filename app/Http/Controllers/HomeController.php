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
            $data2 = MsBuying::where('item_id',[$nama_product])->value('item_price');
            $data3 = MsSales::where('item_id',[$nama_product])->whereBetween('created_at', [$dari,$sampai])->sum('qty');

            $data_untung_with_product = ($total_uang_with_name_product) - ($data2 * $data3);
            
            return view('keuntungan_kerugian.keuntungan_toko', compact('jumlah_uang_with_name_product','total_uang_with_name_product','data_untung_with_product','product'));

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


            return view('keuntungan_kerugian.keuntungan_toko', compact('jumlah_uang_not_with_product', 'total_harga_penjualan','data_untung_not_with_product', 'product'));
            
        }
    
    }


    // public function cari_laporan_untung(Request $request){

    //     $this->validate($request,[
    //         'dari' => 'required',
    //         'sampai' => 'required'
    //     ]);

    //     $dari = date('Y-m-d',strtotime($request->input('dari')));
    //     $sampai = date('Y-m-d',strtotime($request->input('sampai')."+1 day"));

    //     $jumlah_uang = \DB::table('ms_sales')->whereBetween('created_at', [$dari,$sampai])->get();

    //     $total_uang = \DB::table('ms_sales')->whereBetween('created_at', [$dari,$sampai])->sum('total_price');      

    //     return view('keuntungan_kerugian.keuntungan_toko', compact('jumlah_uang', 'total_uang'));
    // }
    

    
}
