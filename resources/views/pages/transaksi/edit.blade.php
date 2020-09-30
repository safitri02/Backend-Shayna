
@extends('lay.default')

@section('sidebar')

@section('navbar')

@section('konten')

<!-- Orders -->
<div class="orders">
<div class="row">
<div class="col-xl-8">
<div class="card mb-5">
    <div class="card-body card-block">
        <h4 class="box-title">Edit Transaksi </h4>
        <form action="/transaksi/update/{{$transaksi->id}}" method="post">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$transaksi->name}}" class="form-control"/>
                @error('name')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" name="number" class="form-control" id="number" value="{{$transaksi->number}}" class="form-control 
                @error('number') is-invalid @enderror"/>
                @error('number')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea type="text" name="address" class="form-control" id="address" value="{{$transaksi->address}}" class="form-control 
                @error('address') is-invalid @enderror"> </textarea>
                @error('address')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <div class="form-group">
                <label for="transaction_total">Transaksi Total</label>
                <input type="number" name="transaction_total" class="form-control" id="transaction_total" value="{{$transaksi->transaction_total}}" class="form-control 
                @error('transaction_total') is-invalid @enderror"/>
                @error('transaction_total')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
           
            <button type="submit" class="btn btn-primary btn-sm float-right"> Ubah Transaksi </button>
        </form>
    </div>

</div>


</div> <!-- /.card -->
</div>  <!-- /.col-lg-8 -->
</div>
</div>
<!-- /.orders -->

@endsection




