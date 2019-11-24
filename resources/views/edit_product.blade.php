@extends('layouts.master-admin ')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                <h3 class="card-title">Edit Product</h3>
                <form class="form-sample" action="{{route('product.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    {{method_field('put')}}
                    @csrf
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                                                <optgroup label="Kategori Lama">
                                                    <option  value="{{$data->id_category}}">{{$data->id_category}}</option>
                                                </optgroup>  
                                                <optgroup label="Kategori Baru">  
                                                    @foreach ($category as $item)
                                                        <option value="{{$item->category_name}}">{{$item->category_name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"  placeholder=" Product" value="{{$data->product_name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Code Product</label>
                                <div class="col-sm-9">
                                    <input type="text" name="product_code" class="form-control" id="exampleInputEmail1"  placeholder=" Product Code" value="{{$data->product_code}}">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Harga Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" name="item_price" class="form-control" id="exampleInputEmail1"  placeholder="Item Price" value="{{$data->item_price}}">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Foto Product</label>
                                <div class="col-sm-9">
                                    @if($data->product_photo)
                                        <img src="{{url('/storage/product/'.$data->product_photo)}}"
                                        width="120px">
                                    @endif
                            
                                    <input type="file" name="product_photo" class="form-control" id="exampleInputEmail1"  placeholder=" Product Photo">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">                      
                                <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Tgl Registrasi</label>
                                <div class="col-sm-9">
                                    <input type="date" name="registration_date" class="form-control" id="exampleInputEmail1"  placeholder=" Registration Date" value="{{$data->registration_date}}">
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label  class="col-sm-3 col-form-label" for="exampleInputEmail1">Satuan Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" name="satuan" class="form-control" id="exampleInputEmail1"  placeholder="Satuan Barang" value="{{$data->satuan}}">
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



