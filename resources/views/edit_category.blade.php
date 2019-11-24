@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-sm-flex align-items-center mb-4">
                        <a href="{{route('category.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                            <i class="icon-arrow-left-circle"></i>
                        </a>
                        <h4 class="card-title mb-sm-0">Edit Category</h4>
                    </div>

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
