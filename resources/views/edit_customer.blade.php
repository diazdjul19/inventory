@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <h3 class="mb-3">Edit Data Customer</h3>   
                <form action="{{route('customer.update', $data->id)}}" method="POST">
                    {{method_field('put')}}
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Customer</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="Customer Name" value="{{$data->name}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Customer</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Customer Name" value="{{$data->email}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">No Handphone Customer</label>
                        <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1"  placeholder="Mobile Phone Number" value="{{$data->no_hp}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Customer</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1"  placeholder="Customer Address" value="{{$data->address}}">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
