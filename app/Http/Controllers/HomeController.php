<?php

namespace App\Http\Controllers;
use App\Models\MsProduct;
use App\Models\MsCategory;
use App\Models\MsCustomer;
use App\Models\MsSupplier;
use App\Models\MsSales;
use App\Models\MsBuying;
use App\User;
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

        // $nama_user = Auth::user()->name;
        
        // toast('Hi '. $nama_user .', Welcome To Inventory Application','success');

        return view('home', compact('jumlah_data_Product','jumlah_data_Customer','jumlah_data_Sales','jumlah_data_Buying'));
    }
}
