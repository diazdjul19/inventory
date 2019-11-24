@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">

                <div class="d-sm-flex align-items-center mb-4">
                    <a href="{{route('customer.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                        <i class="icon-arrow-left-circle"></i>
                    </a>
                    
                    <h4 class="card-title mb-sm-0">Create Customer</h4>
                </div>

                <form action="{{route('customer.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Customer</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="Customer Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Customer</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"  placeholder="Customer Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">No Handphone Customer</label>
                        <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1"  placeholder="Mobile Phone Number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Customer</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1"  placeholder="Customer Address">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
