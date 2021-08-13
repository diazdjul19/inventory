<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

use JD\Cloudder\Facades\Cloudder;

// sweetalert2
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $data = User::paginate(5);
            return view("user", compact('data'));

        }elseif (Auth::user()->role == 'kasir') {
            $nama_user = Auth::user()->name;
            Alert::error('Sorry...', "$nama_user, Anda Bukan Admin...");
            return redirect(route('sales.index'));
        }
        
    }



    public function search_user(Request $request){

        $search = $request->get('search');

        $data = User::where(function($query) use ($search) {
        $query->Where('name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%')
                ->orWhere('created_at','LIKE','%'.$search.'%');
        })->paginate(10);

        return view('user',compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Membuat Validasi Dulu
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
            'user_photo' => ['required', 'file'],
        ]);
        
        // Membuat Data User
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->role = $request->role;

        // MENGUPLOAD IMAGE KE STORAGE BAWAAN LARAVEL
        // if(isset($request->user_photo)){
        //     $imageFile = $request->name.'/'.\Str::random(60).'.'.$request->user_photo->getClientOriginalExtension();
        //     $image_path = $request->file('user_photo')->move(storage_path('app/public/user/'.$request->name), $imageFile);

        //     $data->user_photo = $imageFile;
        // }

        // MENGUPLOAD IMAGE KE STORAGE  CLOUDINARY
        if ($image = $request->file('user_photo')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId);
            $data->user_photo = $logoUrl;
        }

        // dd($data);

        $data->save();

        // alert
        $find_name = $request->name;
        return redirect(route('user.index'))->with('toast_success',"User Dengan Nama '$find_name', Berhasil Di Tambahkan");

        


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
        $data = User::find($id);
        return view('user_edit', compact('data'));

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
        $data = User::find($id);
        
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->role = $request->get('role');
        
        // MENGUPLOAD IMAGE KE STORAGE BAWAAN LARAVEL
        // if(isset($request->user_photo)){
        //     $imageFile = $request->name.'/'.\Str::random(60).'.'.$request->user_photo->getClientOriginalExtension();
        //     $image_path = $request->file('user_photo')->move(storage_path('app/public/user/'.$request->name), $imageFile);

        //     $data->user_photo = $imageFile;
        // }

        // MENGUPLOAD IMAGE KE STORAGE  CLOUDINARY
        if ($image = $request->file('user_photo')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId);
            $data->user_photo = $logoUrl;
        }

        $data->save();

        return redirect(route('user.index'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data1 = User::find($id);
        $find_name = $data1->name;
        
        $data2 = User::find($id)->delete();
        return redirect(route('user.index'))->with('toast_error',"User Dengan Nama '$find_name', Berhasil Di Hapus");
    }
}
