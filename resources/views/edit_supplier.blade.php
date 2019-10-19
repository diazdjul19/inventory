@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
        </div>
    </div>


</div>
@endsection
