
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
       <h4 class="box-title">Transaksi </h4>
   </div>
   <div class="card-body--">
       <div class="table-stats order-table ov-h">
           <table class="table ">
               <thead>
                   <tr>
                       <th class="serial">No</th>
                       <th>Nama</th>
                       <th>Email</th>
                       <th>Total</th>
                       <th> Status </th>
                       <th> Aksi </th>
                   </tr>
               </thead>
               <tbody>
               <?php $no = 1; ?>
               @forelse($transaksi as $t)
               <tr>
                       <td class="serial">{{$no++}}</td>
                        <td> {{$t->name}} </td>
                       <td>  <span class="name">{{$t->address}}</span> </td>
                       <td> <span class="product">{{$t->transaction_total}}</td>
                       <td> 
                            @if($t->transaction_status = 'PENDING')
                                <span class="badge badge-warning">
                            @elseif($t->transaction_status = 'SUCCESS')
                                <span class="badge badge-success">
                            @elseif($t->transaction_status = 'FAILED')
                                <span class="badge badge-danger">
                            @else
                                <span>
                            @endif
                            {{$t->transaction_status}}
                            </span>
                       </td>
                       <td>
                       @if($t->transaction_status = 'PENDING')
                        <a href="/transaksi/{{ $t->id }}/status?status=SUCCESS" class="btn btn-success btn-sm"> <i class="fa fa-check"> </i> </a>
                        <a href="/transaksi/{{ $t->id }}/status?status=FAILED" class="btn btn-danger btn-sm"> <i class="fa fa-times"> </i> </a>
                       @endif
                           <a href="#mymodal" data-remote="/transaksi/show/{{$t->id}}" class="btn btn-info btn-sm"
                           data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi {{$t->uuid}}">
                           <i class="fa fa-eye"> </i> </a>

                           <a href="/transaksi/edit/{{$t->id}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"> </i> </a>

                           <form action="/transaksi/delete/{{ $t->id }}" method="post" class="d-inline">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-danger btn-sm"> Delete
                           <i class="fa fa-trash"> </i>
                           </button>
                           </form>

                       </td>
                   </tr>
                   @empty
                   <tr>
                       <td colspan="6" class="text-center p-5"> 
                       Data Transaksi kosong 
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




