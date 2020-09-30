
@extends('lay.default')

@section('sidebar')

@section('navbar')

@section('konten')

<!-- Orders -->
<div class="orders">
<div class="row">
<div class="col-xl-12">
<div class="card">
    <div class="card-body">
        <h4 class="box-title">Daftar Barang </h4>
    </div>
    <div class="card-body--">
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="serial">No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th> Qty </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                @forelse($product as $product)
                <tr>
                        <td class="serial">{{$no++}}</td>
                        <td> {{$product->name}} </td>
                        <td>  <span class="name">{{$product->type}}</span> </td>
                        <td> <span class="product">{{$product->description}}</td>
                        <td> {{$product->price}}</span></td>
                        <td><span class="count"> {{$product->qty}} </span> </td>
                        <td>
                            <a href="/product/{{$product->id}}/galery" class="btn btn-info btn-sm">
                            <i class="fa fa-picture-o"> </i> </a>
                            <a href="/edit/{{$product->id}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"> </i> </a>

                            <form action="/delete/{{$product->id}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"> Delete
                            <i class="fa fa-trash"> </i>
                            </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-5"> 
                        Data kosong 
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div> <!-- /.table-stats -->
    </div>
</div> <!-- /.card -->
</div>  <!-- /.col-lg-8 -->
</div>
</div>
<!-- /.orders -->

@endsection




