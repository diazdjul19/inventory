<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\MsSales;
use App\Models\MsProduct;
use App\Models\MsCustomer;
use App\Models\MsStock;

use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;







class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = MsSales::with('product','customer')->paginate(5); 

        return view('sales', compact('data'));
        
        
    }

    public function search(Request $request){

        $search = $request->get('search');


        $data = MsSales::join('ms_products','ms_sales.item_id', 'ms_products.id')
        ->join('ms_customers','ms_sales.customers', 'ms_customers.id')
        
        
        ->where(function($q) use($search){
            $q->where('product_name','LIKE','%'.$search.'%')
                ->orWhere('no_invoice','LIKE','%'.$search.'%')
                ->orWhere('qty','LIKE','%'.$search.'%')
                ->orWhere('name','LIKE','%'.$search.'%');

        })->paginate(10);
        

        return view('sales',compact('data'));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = MsProduct::all();

        $customer = MsCustomer::all();

        return view("create_sales", compact('product','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $stock = MsStock::where('product_id', $request->item_id)->first();
        $stock_awal = $stock->jml_barang;
        if ($stock_awal < $request->qty) {
            return redirect(route('sales.index'))->with('stock_kurang', 'Maaf Kami Kekurangan Stock');
        }   
        $stock_akhir = $stock_awal - $request->qty;
        $stock->update(['jml_barang' => $stock_akhir]);



        $data = new MsSales();
        $data->no_invoice = 'NoCode-'.$this->noInvoice(10);
        $data->item_id = $request->item_id;
        $data->customers = $request->customers;
        $data->qty = $request->qty;
        $data->item_price = $request->item_price;
        $data->total_price = $request->total_price;



        $data->payment_nominal = $request->payment_nominal;
        $data->return_nominal = $request->return_nominal;
        $data->save();


        // Jika ingin sekaligus membuat create daya
        // $data = MsSales::create($request->all());

        if ($data) {
            return redirect(route('sales.index'))->with('sukses_create_sales', "Yeyy, Data Anda Telah Berhasil Kami Tambahkan");
            
        } else {
            # code...
        }

        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MsSales::find($id);
        return view("details_sales", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MsSales::with('product')->find($id);
        $product = MsProduct::all();
        $customer = MsCustomer::all();

        // dd($data);
        return view('edit_sales', compact('data','product','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = MsSales::find($id);


        if ($data) {
            $data->update($request->all());

            $alsal = $data->no_invoice;

            return redirect(route('sales.index'))->with('sukses_edit_sales', "Yeyy, Data Dengan No Invoive $alsal Telah Berhasil Kami Edit");

        } else {
            # code...
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = MsSales::find($id);
        $alha = $data->no_invoice;

        $data = MsSales::find($id)->delete();
        return redirect(route('sales.index'))->with('sukses_delete_sales', "Yeyy, Data Dengan No Invoive $alha Telah Berhasil Kami Hapus");;
    }


    private function noInvoice($length = 10)
    {
        $char = '0123456789';
        $char_length = strlen($char);
        $random_string = '';
        for($i=0; $i < $length; $i++){
            $random_string .= $char[rand(0,$char_length-1)];
        }
        return $random_string;
    }


    public function getprice(Request $request)
    {
        $data = MsProduct::find($request->id);
        return response()->json($data, 200);
    }

    
    // public function generatePDF(){
        
    //     $data = ['title' => 'Selamat Datang Di Report Sales'];

    //     $pdf = MsSales::loadView('pdf_sales', $data);
    //     return $pdf->download('laporan-pdf.pdf');
    // }
    
    public function detailpdf($id){
        $data = MsSales::find($id);
        $pdf = \PDF::loadView('pdf.download_detail_sales' , compact('data'));
        return $pdf->download('Sales'.$data->no_invoice.'.pdf');
    }


    
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



    public function data_pdf_sales(){
        $data = MsSales::all();
        $pdf = \PDF::loadView('pdf.download_sales' , compact('data'))->setPaper('a4')->setOrientation('landscape');
        return $pdf->download('SalesDownload-'.$this->code_download(10).'.pdf');
    }

    public function export_sales() 
    {
        return Excel::download(new SalesExport, 'sales.xlsx');
    }



}
