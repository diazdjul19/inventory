@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit
                
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
