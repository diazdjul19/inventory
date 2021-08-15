<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\MsProduct;
use App\Models\MsCategory;

use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

use JD\Cloudder\Facades\Cloudder;





class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = MsProduct::with('category')->paginate(10); 

        // dd($data);
        return view('product',compact('data'));
    }   


    public function search(Request $request){

        $search = $request->get('search');


        $data = MsProduct::where(function($query) use ($search) {
        $query->Where('product_name','LIKE','%'.$search.'%')
                ->orWhere('product_code','LIKE','%'.$search.'%')
                ->orWhere('product_photo','LIKE','%'.$search.'%')
                ->orWhere('registration_date','LIKE','%'.$search.'%')
                ->orWhere('satuan','LIKE','%'.$search.'%');
        })->paginate(10);

        return view('product',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = MsCategory::all();
        return view("create_product", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = MsProduct::create($request->all());

        $data = new MsProduct();
        $data->id_category = $request->id_category;
        $data->product_name = $request->product_name;
        $data->product_code = 'Product-'.$this->productCode(10);
        $data->item_price = $request->item_price;
        $data->satuan = $request->satuan;
        $data->stock = $request->stock;
        $data->product_photo = $request->product_photo;
        $data->registration_date = $request->registration_date;

        // MENGUPLOAD IMAGE KE STORAGE BAWAAN LARAVEL
        // if($request->file('product_photo')){
        //     $imageFile = $request->product_name.'/'.\Str::random(60).'.'.$request->product_photo->getClientOriginalExtension();
        //     $image_path = $request->file('product_photo')->move(storage_path('app/public/product/'.$request->product_name), $imageFile);

        //     $data->product_photo = $imageFile;
        // }

        // MENGUPLOAD IMAGE KE STORAGE CLOUDINARY
        if ($image = $request->file('product_photo')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId);

            $data->product_photo_publicid = $publicId;
            $data->product_photo = $logoUrl;
        }

        $data->save();
        
        // alert
        $proco = $data->product_code;
        $prona = $request->product_name;
        if ($data) {
            return redirect(route('product.index'))->with('toast_success',"Product Dengan Nama '$prona', Berhasil Di Tambahkan");
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
        $data = MsProduct::with('category')->find($id);
        $category = MsCategory::all();



        return view('edit_product', compact('data','category'));
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
        $data = MsProduct::find($id);

        $dala = $data->product_name;
        $daba = $request->product_name;

        $data->id_category = $request->get('id_category');
        $data->product_name = $request->get('product_name');
        $data->product_code = $request->get('product_code');
        $data->item_price = $request->get('item_price');
        $data->registration_date = $request->get('registration_date');
        $data->satuan = $request->get('satuan');

        // MENGUPLOAD IMAGE KE STORAGE BAWAAN LARAVEL
        // if(isset($request->product_photo)){
        //     $imageFile = $request->product_name.'/'.\Str::random(60).'.'.$request->product_photo->getClientOriginalExtension();
        //     $image_path = $request->file('product_photo')->move(storage_path('app/public/product/'.$request->product_name), $imageFile);

        //     $data->product_photo = $imageFile;
        // }

        // MENGUPLOAD IMAGE KE STORAGE CLOUDINARY
        if ($image = $request->file('product_photo')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId);

            $data->product_photo_publicid = $publicId;
            $data->product_photo = $logoUrl;
        }

        // return $data;
        $data->save();


        $edco = $request->product_code;

        return redirect(route('product.index'))->with('toast_info',"Product Dengan Kode Product '$edco', Berhasil Di Ubah");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MsProduct::find($id);
        $haco = $data->product_code;

        if(isset($data->product_photo_publicid)){
            Cloudder::destroyImage($data->product_photo_publicid);
        }

        $data = MsProduct::find($id)->delete();

        return redirect(route('product.index'))->with('toast_error',"Data Dengan Kode Product '$haco', Berhasil Di Hapus");
    }


    // private function productCode($length = 10)
    // {
    //     $char = '0123456789';
    //     $char_length = strlen($char);
    //     $random_string = '';
    //     for($i=0; $i < $length; $i++){
    //         $random_string .= $char[rand(0, $char_length-1)];
    //     }

    //     return $random_string;
    // }

    private function productCode ($length = 10)
    {
        $char = '0123456789';
        $char_length = strlen($char);
        $random_string = '';
        for($i=0; $i < $length; $i++){
            $random_string .= $char[rand(0,$char_length-1)];
        }
        return $random_string;
    }


    public function export_product() 
    {
        return Excel::download(new ProductExport, 'Product.xlsx');
    }



    // download QR Code
    public function download_all_qr(){
        $data = MsProduct::all();
        $pdf = \PDF::loadView('barcode_&_qr.qr_all_product' , compact('data'))->setPaper('a4');
        return $pdf->download('All-QRCode.pdf');
    }

    public function download_each_qr($id){
        $each_data = MsProduct::find($id);
        $pdf = \PDF::loadView('barcode_&_qr.qr_each_product' , compact('each_data'))->setPaper('a4');
        
        return $pdf->download('Each-QrCode-'.$each_data['product_name'].'.pdf');
    }


}


