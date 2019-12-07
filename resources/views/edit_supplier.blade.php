@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-3">Edit Supplier</h1>   
                <form action="{{route('supplier.update', $data->id)}}" method="POST">
                    {{method_field('put')}}                    
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Supplier</label>
                        <input type="text" name="Supplier Name" class="form-control" id="exampleInputEmail1"  placeholder=" Supplier Name" value="{{$data->supplier_name}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perusaan</label>
                        <input type="text" name="legal_name" class="form-control" id="exampleInputEmail1"  placeholder="Legal Name" value="{{$data->legal_name}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1"  placeholder="Mobile Number" value="{{$data->mobile_number}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Email" value="{{$data->email}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="addres" class="form-control" id="exampleInputEmail1"  placeholder="Addres" value="{{$data->addres}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Negara</label>
                        <input type="text" name="country" class="form-control" id="exampleInputEmail1"  placeholder="Country" value="{{$data->country}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode POS</label>
                        <input type="text" name="zib_code" class="form-control" id="exampleInputEmail1"  placeholder="Zib Code" value="{{$data->zib_code}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Bank</label>
                        <input type="text" name="bank_name" class="form-control" id="exampleInputEmail1"  placeholder="Bank Name" value="{{$data->bank_name}}">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">

                <div class="d-sm-flex align-items-center mb-4">
                    <a href="{{route('supplier.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                        <i class="icon-arrow-left-circle"></i>
                    </a>
                    <h3 class="card-title mb-sm-0">Edit Supplier</h3>
                </div>

                <form class="form-sample" action="{{route('supplier.update', $data->id)}}" method="POST">
                    {{method_field('put')}}    
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Nama Supplier</label>                                    
                                    <div class="col-sm-9">
                                        <input type="text" name="Supplier Name" class="form-control" id="exampleInputEmail1"  placeholder=" Supplier Name" value="{{$data->supplier_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Nama Perusaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="legal_name" class="form-control" id="exampleInputEmail1"  placeholder="Legal Name" value="{{$data->legal_name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">No HP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1"  placeholder="Mobile Number" value="{{$data->mobile_number}}">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Email</label>                                
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Email" value="{{$data->email}}">
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Nama Bank</label>                                
                                <div class="col-sm-9">
                                    <input type="text" name="bank_name" class="form-control" id="exampleInputEmail1"  placeholder="Bank Name" value="{{$data->bank_name}}">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Negara</label>
                                <div class="col-sm-9">
                                    <input type="text" name="country" class="form-control" id="exampleInputEmail1"  placeholder="Country" value="{{$data->country}}">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kode POS</label>                                    
                                <div class="col-sm-9">
                                    <input type="text" name="zib_code" class="form-control" id="exampleInputEmail1"  placeholder="Zib Code" value="{{$data->zib_code}}">
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Alamat Lengkap</label>                                   
                                <div class="col-sm-9">
                                    <input type="text" name="addres" class="form-control" id="exampleInputEmail1"  placeholder="Gang / Jalan, Rt, Rw, Kelurahan, Kecamatan, Kota" value="{{$data->addres}}">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kelurahan</label>                                    
                                <div class="col-sm-9">
                                    <input type="text" name="village_office" class="form-control" id="exampleInputEmail1"  placeholder="village office" value="{{$data->village_office}}">
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kecamatan</label>                                   
                                <div class="col-sm-9">
                                    <input type="text" name="districts" class="form-control" id="exampleInputEmail1"  placeholder="Districts" value="{{$data->districts}}">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kota</label>                                    
                                <div class="col-sm-9">
                                    <input type="text" name="city" class="form-control" id="exampleInputEmail1"  placeholder="City" value="{{$data->city}}">
                                </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
