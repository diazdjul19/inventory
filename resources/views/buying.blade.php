@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-11">
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
        </div>
    </div>


<nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination justify-content-center">
        {{$data->links()}}
    </ul>
</nav>
@endsection
