<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MsStock;
use App\Models\MsProduct;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsStock::with('product')->paginate(5); 
        return view('stock', compact('data','product'));
    }

    public function search(Request $request){
        $search = $request->get('search');

        $data = MsStock::join('ms_Products', 'ms_stocks.product_id', 'ms_products.id')->where(function($q) use($search){
            $q->where('product_name', 'LIKE', '%'.$search.'%')
                ->orwhere('jml_barang', 'LIKE', '%'.$search.'%')
                ->orwhere('tgl_update', 'LIKE', '%'.$search.'%');
        })->paginate(5);
        return view('stock', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = MsProduct::all();
        return view('create_stock', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data_product = MsProduct::with('product');
        $data = MsStock::create($request->all());
        // $data_product = MsProduct::'product_name';
        // dd($request->all());
        $name_pro = MsProduct::find($request->product_id)->product_name;
        $sc_jmlbrg = $request->jml_barang;
        $sc_tgl_update = $request->tgl_update;
        if ($data) {
            return redirect(route('stock.index'))->with('sukses_create_stock',"Data Baru Dengan Nama Product $name_pro Dan Jumlah Barang $sc_jmlbrg Pada Tanggal $sc_tgl_update, Telah Berhasil Di Tambahkan ");
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
        $data = MsStock::with('product')->find($id);
        $product = MsProduct::all();


        return view('edit_stock', compact('data', 'product'));
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
        $data = MsStock::find($id);
        $su_jmlbrg_sb = $data->jml_barang;


        if ($id) {
            $su_jmlbrg_ss = $request->jml_barang;
            $su_tglupdate = $request->tgl_update;
            
            $enapro = MsProduct::find($request->product_id)->product_name;

            $data->update($request->all());
            return redirect(route('stock.index'))->with('sukses_edit_stock', "Data Lama Dengan Nama Product $enapro Dan Jumlah Barang Yang Sebelumnya $su_jmlbrg_sb Telah Di Ubah Menjadi $su_jmlbrg_ss, Pada Tanggal $su_tglupdate");
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
        $data = MsStock::find($id);

        $denapro = MsProduct::find($data->product_id);
        // dd($denapro->product_name);
        $sd_jmlbrg = $data->jml_barang;
        $sd_tglhps = $data->tgl_update;


        $data = MsStock::find($id)->delete();
        return redirect(route('stock.index'))->with('sukses_hapus_stock', "Data Dengan Nama Product $denapro->product_name Dan Jumlah Barang $sd_jmlbrg , Telah Berhasil Di Hapus Pada Tanggal $sd_tglhps");
    }
}

