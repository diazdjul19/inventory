{{-- @extends('layouts.master-admin')

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
                    
                    <h4 class="card-title mb-sm-0">Create New User</h4>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama User</label>
                                <div class="col-sm-8">
                                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
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
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Foto / Icon</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="" placeholder="Foto / Icon" />
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status User</label>
                                <div class="col-sm-8">
                                <select class="form-control" name="" placeholder="Status User">
                                    <option>Administrator</option>
                                    <option>Admin</option>
                                    <option>User Biasa</option>
                                </select>
                                </div>
                            </div>
                            </div>
                        </div>


                    <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection --}}
