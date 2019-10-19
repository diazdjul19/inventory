<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\MsCategory;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = MsCategory::paginate(5); 
        return view('category',compact('data'));

    }

    public function search(Request $request){

        $search = $request->get('search');

        $data = DB::table('ms_categories')->where('category_name', 'like', '%'.$search.'%')->paginate(5);

        return view('category',['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_category');
    }


    // public function search(Request $request){

    //     $search = $request->get('search');
    //     $categories = App\Models\MsCatecory::table('ms_categories')->where('category_name', 'LIKE', '% .$search. %')->paginate(5);

    //     return view('category', ['categories'=> $categories]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = MsCategory::create($request->all());

        if ($data) {
            $cc = $request->category_name;
            return redirect(route('category.index'))->with('sukses_create_category', "Data Baru Dengan Nama $cc ,Telah Berhasil Di Tambahkan");
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
        $data = MsCategory::find($id);
        return view('edit_category', compact("data"));

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
        $data =  MsCategory::find($id);
        $cu_sb = $data->category_name;
        if($data){
            $data->update($request->all());
            $cu_ss = $request->category_name;
            return redirect(route('category.index'))->with('sukses_edit_category', "Data Dengan Nama $cu_sb Telah Di Ubah Menjadi $cu_ss");
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
        $data =  MsCategory::find($id);
        $cd = $data->category_name;

        $data = MsCategory::find($id)->delete();
        
        return redirect(route('category.index'))->with('sukses_hapus_category', "Data Dengan Nama $cd, Telah Berhasil Di Hapus");
        
    }



}

