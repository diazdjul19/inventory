@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Edit Category</h4>
                </div>

                <div class="card-body">
                <form action="{{route('category.update', $data->id)}}" method="post">
                    {{method_field('put')}}
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"  placeholder=" Category" value="{{$data->category_name}}">
            
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
