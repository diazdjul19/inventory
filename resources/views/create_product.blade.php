@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <h3 class="card-title">Create Product</h3>
            <form class="form-sample" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                                            <option>-- Pilih Category --</option>
                                            @foreach ($category as $item)
                                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"  placeholder=" Product">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Code Product</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_code" class="form-control" id="exampleInputEmail1"  placeholder=" Product Code">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Harga Barang</label>
                            <div class="col-sm-9">
                                <input type="text" name="item_price" class="form-control" id="exampleInputEmail1"  placeholder="Item Price">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Foto Product</label>
                            <div class="col-sm-9">
                                <input type="file" name="product_photo" class="form-control" id="exampleInputEmail1"  placeholder=" Product Photo">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">                      
                            <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Tgl Registrasi</label>
                            <div class="col-sm-9">
                                <input type="date" name="registration_date" class="form-control" id="exampleInputEmail1"  placeholder=" Registration Date">
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Satuan Barang</label>
                            <div class="col-sm-9">
                                <input type="text" name="satuan" class="form-control" id="exampleInputEmail1"  placeholder="Satuan Barang">
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
