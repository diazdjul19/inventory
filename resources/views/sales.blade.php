@extends('layouts.master-admin')


@section('form')
<form class="search-form d-none d-md-block" action="/search_sales" method="GET">
    <i class="icon-magnifier"></i>
    <input type="search" name="search" class="form-control" placeholder="Search Here" title="Search here" autocomplete="off">
</form>
@endsection

@section('wrapper')

    @if(session('sukses_create_sales'))
        <div class="alert alert-success" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Tambahkan</h4> 
            <p>{{session('sukses_create_sales')}}&#128516;</p>
        </div>
    @endif

    @if(session('sukses_edit_sales'))
        <div class="alert alert-primary" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Edit</h4> 
            <p>{{session('sukses_edit_sales')}}&#128523;</p>
        </div>
    @endif

    @if(session('sukses_delete_sales'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Data Berhasil Di Hapus</h4> 
            <p>{{session('sukses_delete_sales')}}&#128517;</p>
        </div>
    @endif  
    
    @if(session('stock_kurang'))
        <div class="alert alert-danger" role="alert" style="text-align:center">
            <h4 class="alert-heading">Stock Kurang</h4> 
            <p>{{session('stock_kurang')}}&#128549;</p>
        </div>
    @endif

    
    <div class="row justify-content-center">
        {{-- <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard 
                    <a href="{{route('sales.create')}}">Tambah Data Penjualan</a>

                    <form class="form-inline float-right" action="/search_sales" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped ">
                        <tr>
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Item Name (Item ID)</th>
                            <th>Customers</th>
                            <th>Quantity</th>
                            <th>Harga Per Item</th>
                            <th>Total Harga</th>
                            <th>Nominal Pembayaran(Rp)</th>
                            <th>Nominal Kembalian(Rp)</th>
                            <th>Action</th>
                        </tr>
                
                        @foreach ($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->no_invoice}}</td>
                                <td>{{$d->product->product_name}}</td>
                                <td>{{$d->customer->name}}</td>
                                <td>{{$d->qty}}</td>
                                <td>Rp. {{number_format($d->item_price,2,',','.')}}</td>
                                <td>{{$d->total_price}}</td>
                                <td>{{$d->payment_nominal}}</td>
                                <td>{{$d->return_nominal}}</td>
                                <td>
                                    <a href="{{route('sales.edit', $d->id)}}">Edit |</a>
                                    <a href="{{route('sales.destroy', $d->id)}}">Delete |</a>
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
                        <h4 class="card-title mb-sm-0">Sales Inventory</h4>
                        <a href="{{route("export_sales")}}" class="btn btn-success btn-icon-text btn-sm ml-auto mb-3 mb-sm-0 mr-3">Export Exel <i class="fas fa-file-excel btn-icon-append"></i></a>
                        <a href="{{route("datasales")}}" class="btn btn-danger btn-icon-text btn-sm  mr-2">Download PDF <i class="fas fa-file-pdf btn-icon-append"></i> </a>
                        <a href="{{route("sales.create")}}" class="btn btn-primary btn-fw "> <i class="icon-plus mr-1"></i> Create Sales</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="table-primary">
                                <th class="font-weight-bold">No</th>
                                <th class="font-weight-bold">No Invoice</th>
                                <th class="font-weight-bold">Nama Customers</th>
                                <th class="font-weight-bold">Nama Product</th>
                                {{-- <th class="font-weight-bold">Quantity</th> --}}
                                <th class="font-weight-bold">Harga Per Item</th>
                                {{--<th class="font-weight-bold">Total Harga</th>
                                <th class="font-weight-bold">Nominal Pembayaran (Rp)</th>
                                <th class="font-weight-bold">Nominal Kembalian (Rp)</th> --}}
                                <th class="font-weight-bold text-center">Action</th>
                                <th class="font-weight-bold text-center">Details</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->no_invoice}}</td>
                                    <td>{{$d->customer->name}}</td>
                                    <td>{{$d->product->product_name}}</td>
                                    {{-- <td>{{$d->qty}}</td> --}}
                                    <td>Rp. {{number_format($d->item_price,2,',','.')}}</td>
                                    {{--<td>Rp. {{number_format($d->total_price,2,',','.')}}</td>
                                    <td>Rp. {{number_format($d->payment_nominal,2,',','.')}}</td>
                                    <td>Rp. {{number_format($d->return_nominal,2,',','.')}}</td> --}}
                                    <td>
                                        <a class="btn btn-success btn-rounded btn-sm" href="{{route('sales.edit', $d->id)}}"><i class="icon-note"></i> Edit</a>
                                        <a class="btn btn-danger btn-rounded btn-sm" href="{{route('sales.destroy', $d->id)}}"><i class="icon-trash"></i> Delete</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-rounded btn-sm" href="{{route('sales.show', $d->id)}}"><i class="icon-info"></i> Info</a>
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
