<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\MsSupplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_peginate = MsSupplier::paginate(5);
        $data = MsSupplier::all();
        return view('supplier', compact('data','data_peginate'));
    }


    public function search(Request $request){
        
        $search = $request->get('search');

        $data = MsSupplier::where(function($query) use ($search) {
        // $secana = MsCategory::all();

        $query->where('supplier_name','LIKE','%'.$search.'%')
            ->orWhere('legal_name','LIKE','%'.$search.'%')
            ->orWhere('mobile_number','LIKE','%'.$search.'%')
            ->orWhere('email','LIKE','%'.$search.'%')
            ->orWhere('addres','LIKE','%'.$search.'%')
            ->orWhere('country','LIKE','%'.$search.'%')
            ->orWhere('zib_code','LIKE','%'.$search.'%')
            ->orWhere('bank_name','LIKE','%'.$search.'%');
        })->paginate(5);

        return view('supplier', compact('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_supplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = MsSupplier::create($request->all());

        if ($data) {
            return redirect(route('supplier.index'));
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
        $data = MsSupplier::find($id);
        return view('edit_supplier', compact('data'));
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
        $data = MsSupplier::find($id);

        if ($data) {

            $data->update($request->all());

            return redirect((route('supplier.index')));
        }else {
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
        $data = MsSupplier::find($id)->delete();
        return redirect(route('supplier.index'));
    }
}
