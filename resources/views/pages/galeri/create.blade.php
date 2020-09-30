
@extends('lay.default')

@section('sidebar')

@section('navbar')

@section('konten')

<!-- Orders -->
<div class="orders">
<div class="row justify-content-center">
<div class="col-xl-8 mt-3">
<div class="card mb-5">
    <div class="card-body card-block">
        <h4 class="box-title">Tambah Foto Barang </h4>
        <form action="/photo/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="products_id">Nama Barang</label>
            <select class="form-control" name="products_id">
            @foreach($product as $p)
            <option value="{{$p->id}}">{{ $p->name  }}</option>
            @endforeach
            </select>
            @error('products_id')<div class="text-muted"> {{$message}} </div> @enderror
        </div>
               
        <div class="form-group">
            <label for="gambar">Foto Barang</label>
            <input type="file" name="photo" class="form-control" id="gambar" value="{{old('photo')}}" accept="image/*" class="form-control 
            @error('photo') is-invalid @enderror"/>
            @error('name')<div class="text-muted"> {{$message}} </div> @enderror
        </div>
        <div class="form-group">
            <label for="is_default">Default</label>
            <br>
            <label>
            <input type="radio" name="is_default" class="form-control" id="is_default" value="1" class="form-control 
            @error('is_default') is-invalid @enderror"/> Ya
            </label>
            &nbsp
            <label>
            <input type="radio" name="is_default" class="form-control" id="is_default" value="0" class="form-control 
            @error('is_default') is-invalid @enderror"/> Tidak
            </label>
            @error('is_default')<div class="text-muted"> {{$message}} </div> @enderror
        </div>

            <button type="submit" class="btn btn-primary btn-sm float-right"> Tambah Foto </button>
        </form>
    </div>

</div>


</div> <!-- /.card -->
</div>  <!-- /.col-lg-8 -->
</div>
</div>
<!-- /.orders -->


@endsection




