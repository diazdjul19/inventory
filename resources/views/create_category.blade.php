@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0">Create Category</h4>
                </div>

                
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Nama Kategori</label>
                        <input type="text" name="category_name" class="form-control" id="category_name"  placeholder=" Category">
                
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
