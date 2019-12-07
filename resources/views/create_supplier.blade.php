@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <h1 class="mb-3">Tambah Supplier</h1>   
                <form action="{{route('supplier.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Supplier</label>
                        <input type="text" name="Supplier Name" class="form-control" id="exampleInputEmail1"  placeholder=" Supplier Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perusaan</label>
                        <input type="text" name="legal_name" class="form-control" id="exampleInputEmail1"  placeholder="Legal Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1"  placeholder="Mobile Number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Email">
                    </div>

                    <div class="form-group"> Jangan Lupa Ini paling akhir
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="addres" class="form-control" id="exampleInputEmail1"  placeholder="Addres">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Negara</label>
                        <input type="text" name="country" class="form-control" id="exampleInputEmail1"  placeholder="Country">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode POS</label>
                        <input type="text" name="zib_code" class="form-control" id="exampleInputEmail1"  placeholder="Zib Code">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Bank</label>
                        <input type="text" name="bank_name" class="form-control" id="exampleInputEmail1"  placeholder="Bank Name">
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
                    <h3 class="card-title mb-sm-0">Create Supplier</h3>
                </div>
                
                <form class="form-sample" action="{{route('supplier.store')}}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Nama Supplier</label>                                    
                                    <div class="col-sm-9">
                                        <input type="text" name="supplier_name" class="form-control" id="exampleInputEmail1"  placeholder=" Supplier Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Nama Perusaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="legal_name" class="form-control" id="exampleInputEmail1"  placeholder="Legal Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">No HP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1"  placeholder="Mobile Number">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Email</label>                                
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Email">
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Nama Bank</label>                                
                                <div class="col-sm-9">
                                    <input type="text" name="bank_name" class="form-control" id="exampleInputEmail1"  placeholder="Bank Name">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Negara</label>
                                <div class="col-sm-9">
                                    <input type="text" name="country" class="form-control" id="exampleInputEmail1"  placeholder="Country">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kode POS</label>                                    
                                <div class="col-sm-9">
                                    <input type="text" name="zib_code" class="form-control" id="exampleInputEmail1"  placeholder="Zib Code">
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Alamat</label>                                   
                                <div class="col-sm-9">
                                    <input type="text" name="addres" class="form-control" id="exampleInputEmail1"  placeholder="Gang / Jalan, Rt, Rw">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kelurahan</label>                                    
                                <div class="col-sm-9">
                                    <input type="text" name="village_office" class="form-control" id="exampleInputEmail1"  placeholder="village office">
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kecamatan</label>                                   
                                <div class="col-sm-9">
                                    <input type="text" name="districts" class="form-control" id="exampleInputEmail1"  placeholder="Districts">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Kota</label>                                    
                                <div class="col-sm-9">
                                    <input type="text" name="city" class="form-control" id="exampleInputEmail1"  placeholder="City">
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
