@extends('layouts.master-admin')

@section('wrapper')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body"> 
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12 d-sm-flex align-items-center mb-4">
                                <a href="{{route('supplier.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                                    <i class="icon-arrow-left-circle"></i>
                                </a>
                                <h4 class="card-title mb-sm-0">Detail Supplier</h4>
                                {{-- <a href="{{route('generatepdf' , $data->id)}}" class="btn btn-info btn-icon-text ml-auto mb-3 mb-sm-0">Download <i class="icon-cloud-download btn-icon-append"></i></a> --}}
                            </div>
                            
                            <div class="col-sm-6">
                                <table class="table w-100">
                                    <tr>
                                        <th>Nama Supplier</th>
                                        <td>{{$data->supplier_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <td>{{$data->legal_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telfon</th>
                                        <td>{{$data->mobile_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Bank</th>
                                        <td>{{$data->bank_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal & Waktu</th>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table w-100">
                                    <tr>
                                        <th>Negara</th>
                                        <td>{{$data->country}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pos</th>
                                        <td>{{$data->zib_code}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{$data->addres}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelurahan</th>
                                        <td>{{$data->village_office}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>{{$data->districts}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>{{$data->city}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection