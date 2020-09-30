
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
        <h4 class="box-title">Edit Barang </h4>
        <form action="/product/update/{{$product->id}}" method="post">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" class="form-control"/>
                @error('name')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control" id="type" value="{{$product->type}}" class="form-control 
                @error('type') is-invalid @enderror"/>
                @error('type')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" name="description" class="form-control" id="description" value="{{$product->price}}" class="form-control 
                @error('description') is-invalid @enderror"> </textarea>
                @error('description')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}" class="form-control 
                @error('price') is-invalid @enderror"/>
                @error('price')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" name="qty" class="form-control" id="qty" value="{{$product->qty}}" class="form-control 
                @error('qty') is-invalid @enderror"/>
                @error('qty')<div class="text-muted"> {{$message}} </div> @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm float-right"> Ubah Barang </button>
        </form>
    </div>

</div>


</div> <!-- /.card -->
</div>  <!-- /.col-lg-8 -->
</div>
</div>
<!-- /.orders -->

@endsection




