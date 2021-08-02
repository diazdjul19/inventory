<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\MsCustomer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsCustomer::paginate(5);
        return view('customer',compact('data'));

    }

    public function search(Request $request){
        
        $search = $request->get('search');

        $data = MsCustomer::where(function($query) use ($search) {
        // $secana = MsCategory::all();

        $query->where('name','LIKE','%'.$search.'%')
            ->orWhere('email','LIKE','%'.$search.'%')
            ->orWhere('no_hp','LIKE','%'.$search.'%')
            ->orWhere('address','LIKE','%'.$search.'%')
            ;
        })->paginate(5);

        return view('customer', compact('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = MsCustomer::create($request->all());
        dd($data);
        $result_name = $request->name;
        $request_email = $request->email;

        if ($data) {
            return redirect(route('customer.index'))->with('toast_success',"Customer Dengan Nama '$result_name', Telah Berhasil Di Tambahkan");
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
        $data = MsCustomer::find($id);

        return view('edit_customer', compact('data'));
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
        $data = MsCustomer::find($id);
        

        if ($data) {

            $data->update($request->all());

            $result_name = $request->name;
            $result_email = $request->email;


            return redirect(route('customer.index'))->with('toast_info',"Customer Dengan Nama '$result_name', Telah Berhasil Di Ubah");
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
        $data = MsCustomer::find($id);
        $result_name = $data->name;
        $result_email = $data->email;


        $data = MsCustomer::find($id)->delete();
        // $haco = $data->product_code;
        // $data = MsProduct::find($id)->delete();

        return redirect(route('customer.index'))->with('toast_error',"Customer Dengan Nama '$result_name', Telah Berhasil Di Hapus");
    }
}
