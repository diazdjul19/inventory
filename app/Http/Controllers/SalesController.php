<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\MsSales;
use App\Models\MsProduct;
use App\Models\MsCustomer;
use App\Models\MsStock;







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


        $data = MsSales::where(function($query) use ($search) {
            // $secana = MsCategory::all();

            $query->where('no_invoice','LIKE','%'.$search.'%')
                ->orWhere('item_id','LIKE','%'.$search.'%')
                ;
        })->paginate(5);
        

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


        $stock = MsStock::where('product_id',$request->item_id)->first();

        $stock_awal = $stock->jml_barang;

        if ($stock_awal < $request->qty) {
            return "Jumlah Stock Tidak cukup";
        }
            
        $stock_akhir = $stock_awal - $request->qty;



        $stock->update(['jml_barang' => $stock_akhir]);


        $data = MsSales::create($request->all());

        if ($data) {
            return redirect(route('sales.index'));
            
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
        //
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
            return redirect(route('sales.index'));

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
        $data = MsSales::find($id)->delete();

        return redirect(route('sales.index'));
    }


}
