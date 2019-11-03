<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MsBuying;
use App\Models\MsSupplier;
use App\Models\MsProduct;
use App\Models\MsStock;

use App\Exports\BuyingExport;
use Maatwebsite\Excel\Facades\Excel;




class BuyingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsBuying::paginate(5);
        $data_supplier = MsSupplier::all();
        $data_product = MsProduct::all();




        return view("buying", compact('data','data_supplier','data_product'));
    }



    public function search(Request $request){

        $search = $request->get('search');


        $data = MsBuying::join('ms_products','ms_buyings.item_id', 'ms_products.id')
        ->join('ms_suppliers','ms_buyings.supplier_id', 'ms_suppliers.id')
                
        ->where(function($q) use($search){
            $q->where('product_name','LIKE','%'.$search.'%')
                ->orWhere('supplier_name','LIKE','%'.$search.'%')
                ->orWhere('no_invoice','LIKE','%'.$search.'%');


            
        })->paginate(10);
        

        return view('buying',compact('data'));
    }
    

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_supplier = MsSupplier::all();
        $data_product = MsProduct::all();

        return view("create_buying", compact('data_supplier', 'data_product', 'datato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $stock = MsStock::where('product_id',$request->item_id)->first();
        $stock_awal = $stock->jml_barang;
        $stock_akhir = $stock_awal + $request->qty;
        $stock->update(['jml_barang' => $stock_akhir]);

        
        $data = new MsBuying();
        $data->no_invoice = 'NoCode-'.$this->noInvoice(10);
        $data->supplier_id = $request->supplier_id;
        $data->item_id = $request->item_id;
        $data->qty = $request->qty;
        $data->item_price = $request->item_price;
        $data->delivery_fee= $request->delivery_fee;
        $data->item_status= 'pending';
        $data->total_price_item = $request->total_price_item;
        $data->total_all_price = $request->total_all_price;
        // $data->total_price_item = $request->total_price_item;
        // $total = $request->qty * $request->item_price + $request->delivery_fee;
        // $data->total_price_item = $total;
        $data->save();


        if ($data) {
            return redirect(route('buying.index'))->with("sukses_create_buying",'Yeyyy, Data Anda Berhasil Di Tambahkan');
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
        $data = MsBuying::find($id);
        return view("details_buying", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MsBuying::find($id)->delete();

        return redirect(route('buying.index'))->with("sukses_delete_buying",'Yeyyy, Data Anda Berhasil Di Hapus');
    }

    private function noInvoice($length = 10)
    {
        $char = '0123456789';
        $char_length = strlen($char);
        $random_string = '';
        for($i=0; $i < $length; $i++) {
            $random_string .= $char[rand(0,$char_length-1)];
        }

        return $random_string;
    }

    public function approve($id){
        $data = MsBuying::find($id);
        $data->update(['item_status' => 'Approve']);

        return redirect(route('buying.index'));
    }

    public function cancel($id){
        $data = MsBuying::find($id);
        $data->update(['item_status' => 'Cancel']);

        return redirect(route('buying.index'));
    }


    public function detail_buying_pdf($id){
        $data = MsBuying::find($id);
        $pdf = \PDF::loadView('pdf.download_detail_buying' , compact('data'));
        return $pdf->download('Buying'.$data->no_invoice.'.pdf');
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

    public function data_pdf_buying(){
        $data = MsBuying::all();
        $pdf = \PDF::loadView('pdf.download_buying' , compact('data'))->setPaper('a4')->setOrientation('landscape');
        return $pdf->download('BuyingDownload-'.$this->code_download(10).'.pdf');
    }

    public function export_buying() 
    {
        return Excel::download(new BuyingExport, 'buying.xlsx');
    }


    
} 