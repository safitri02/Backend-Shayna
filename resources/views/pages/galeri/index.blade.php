
@extends('lay.default')

@section('sidebar')

@section('navbar')

@section('konten')

<!-- Orders -->
<div class="orders">
<div class="row justify-content-center">
<div class="col-xl-10">
<div class="card">
  <div class="card-body">
      <h4 class="box-title">Daftar Foto Barang </h4>
  </div>
  <div class="card-body--">
      <div class="table-stats order-table ov-h">
          <table class="table ">
              <thead>
                  <tr>
                      <th class="serial">No</th>
                      <th>Nama Barang</th>
                      <th>Foto</th>
                      <th>Default</th>  
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
              @forelse($galeri as $galeri)
                  <tr>
                      <td class="serial">{{$no++}}</td>
                      <td> {{$galeri->product->name}} </td>
                      <td> <img src="{{ url($galeri->photo) }}" /> </td>
                      <td> {{$galeri->is_default ? 'Ya' : 'Tidak'}} </td>
                      <td>

                          <form action="/photo/delete/{{$galeri->id}}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger btn-sm"> Delete
                          <i class="fa fa-trash"> </i>
                          </button>
                          </form>
                      @empty
                      </td>
                  </tr>
                  
                  <tr>
                      <td colspan="6" class="text-center p-5"> 
                      Foto Product kosong 
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




