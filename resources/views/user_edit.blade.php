@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">

                <div class="d-sm-flex align-items-center mb-4">
                    <a href="{{route('user.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                        <i class="icon-arrow-left-circle"></i>
                    </a>
                    
                    <h4 class="card-title mb-sm-0">Edit User</h4>
                </div>

                <form action="{{route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    {{method_field('put')}}
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama User</label>
                                <div class="col-sm-8">
                                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} {{$data->name}}" required autocomplete="name" placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email User</label>
                                <div class="col-sm-8">
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} {{$data->email}}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" value="">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Foto / Icon</label>
                                <div class="col-sm-8">
                                    {{-- MENGAMBIL IMAGE DARI SORAGE BAWAAN LARAVEL --}}
                                    {{-- @if($data->user_photo)
                                        <img src="{{url('/storage/user/'.$data->user_photo)}}"
                                        width="100px">
                                    @endif --}}
                                    
                                    {{-- MENGAMBIL IMAGE DARI STORAGE CLOUDINARY --}}
                                    @if($data->user_photo)
                                        <img src="{{$data->user_photo}}"
                                        width="100px">
                                    @endif

                                    <input type="file" class="form-control form-control-lg" name="user_photo" id="user_photo" placeholder="User Photo">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tingkat User</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="exampleFormControlSelect1" name="role">
                                        <optgroup label="Tingkat Lama">
                                            <option  value="{{$data->role}}">
                                                @if ($data->role == 'admin')
                                                    <span>Admin</span>
                                                @elseif($data->role == 'kasir')
                                                    <span>Kasir</span>    
                                                @endif
                                            </option>
                                        </optgroup>  
                                        <optgroup label="Tingkat Baru">  
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
