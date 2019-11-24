@extends('layouts.master-admin')

@section('form')
<form class="search-form d-none d-md-block" action="/search_buying" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection

@section('wrapper')

    @if(session('sukses_create_buying'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_buying')}}&#128516;</p>
        </div>
    @endif

    @if(session('sukses_delete_buying'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Hapus</h4> 
            <p>{{session('sukses_delete_buying')}}&#128517;</p>
        </div>
    @endif  
    


    <div class="row justify-content-center">
        {{-- <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard 
                    <a href="{{route('buying.create')}}">Beli Barang</a>

                    <form class="form-inline float-right" action="/search_buying" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Nama Supplier</th>
                            <th>Nama Item</th>
                            <th>Quantity</th>
                            <th>Harga Per Item</th>
                            <th>Biaya Antar</th>
                            <th>Total Harga</th>
                            <th>Status Pembelian</th>
                            <th>Action</th>

                        </tr>
                        
                        
                        @foreach ($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->no_invoice}}</td>
                                <td>{{$d->supplier->supplier_name}}</td>
                                <td>{{$d->product->product_name}}</td>
                                <td>{{$d->qty}}</td>
                                <td>{{$d->item_price}}</td>
                                <td>{{$d->delivery_fee}}</td>
                                <td>{{$d->total_price}}</td>
                                <td>
                                    @if ($d->item_status == 'pending')
                                        <span class="badge badge-pill badge-warning">{{$d->item_status}}</span>                                        
                                    @elseif($d->item_status == 'Approve')
                                        <span class="badge badge-pill badge-success">{{$d->item_status}}</span>                                        
                                    @elseif($d->item_status == 'Cancel')
                                        <span class="badge badge-pill badge-danger">{{$d->item_status}}</span>                                                                        
                                    @endif
                                </td>                                


                                <td>
                                    <a href="{{route('buying.destroy',$d->id)}}" class="btn btn-outline-danger">Delete</a>
                                    <a class="badge badge-success" href="{{route('buying.approve',$d->id)}}">Approve</a>
                                    <a class="badge badge-danger" href="{{route('buying.cancel',$d->id)}}">Cancel</a>

                                </td>
                            </tr>
                        @endforeach
                        
                </table>
                </div>
            </div>
        </div> --}}

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        <h4 class="card-title mb-sm-0">Buying Inventory</h4>
                        <a href="{{route("export_buying")}}" class="btn btn-success btn-icon-text btn-sm ml-auto mb-3 mb-sm-0 mr-3">Export Exel <i class="fas fa-file-excel btn-icon-append"></i></a>
                        <a href="{{route("data_buying")}}" class="btn btn-danger btn-icon-text btn-sm  mr-2">Download PDF <i class="fas fa-file-pdf btn-icon-append"></i></a>
                        <a href="{{route("buying.create")}}" class="btn btn-primary btn-fw "> <i class="icon-plus mr-1"></i> Create Buying</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="table-info">
                                <th class="font-weight-bold">No</th>
                                <th class="font-weight-bold">No Invoice</th>
                                <th class="font-weight-bold">Nama Supplier</th>
                                <th class="font-weight-bold">Nama Product</th>
                                <th class="font-weight-bold">Jumlah Barang</th>
                                <th class="font-weight-bold text-center">Status</th>
                                <th class="font-weight-bold text-center">Status Action</th>
                                <th class="font-weight-bold text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->no_invoice}}</td>
                                <td>{{$d->name_supplier->supplier_name }}</td>
                                <td>{{$d->product->product_name}}</td>
                                <td>( {{$d->qty}} ) {{$d->satuan}}</td>
                                <td class="text-center">
                                    @if ($d->item_status == 'pending')
                                        <span class="badge badge-warning p-2">{{$d->item_status}}</span>                                        
                                    @elseif($d->item_status == 'Approve')
                                        <span class="badge badge-success p-2">{{$d->item_status}}</span>                                        
                                    @elseif($d->item_status == 'Cancel')
                                        <span class="badge badge-danger p-2">{{$d->item_status}}</span>                                                                        
                                    @endif
                                </td>                                

                                <td class="text-center">
                                    <a class="badge badge-success p-2" href="{{route('buying.approve',$d->id)}}">Approve</a>
                                    <a class="badge badge-danger p-2" href="{{route('buying.cancel',$d->id)}}">Cancel</a>
                                </td>

                                <td class="text-center">
                                    <a title="Delete" class="btn btn-danger btn-rounded btn-sm " href="{{route('buying.destroy', $d->id)}}"><i class="icon-trash"></i></a>
                                    <a title="Info" class="btn btn-info btn-rounded btn-sm" href="{{route('buying.show', $d->id)}}"><i class="icon-info"></i></a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="d-flex mt-2 mr-5 flex-wrap">
                        <nav class="ml-auto">
                        <ul class="pagination separated pagination-info">
                            <li class="page-item">{{$data->links()}}</li>
                            
                        </ul>
                        </nav>
                    </div>
            </div>
        </div>
    </div>
@endsection
