
<table class=" table table-bordered"> 
     <tr>
          <th> Nama </th>
          <td> {{$transaksi->name}} </td>
     </tr>
     <tr>
          <th> Email </th>
          <td> {{$transaksi->address}} </td>
     </tr>
     <tr>
          <th> Total $transaksi </th>
          <td> {{$transaksi->transaction_total}} </td>
     </tr>
     <tr>
          <th> Status $transaksi </th>
          <td> {{$transaksi->transaction_status}} </td>
     </tr>
     <tr>
          <th> Pembelian produk</th>
          <td> 
               <table class="table table-bordered">
                    <tr> 
                         <th> Nama  </th>
                         <th> Type  </th>
                         <th> Harga  </th>
                    </tr>
                    @foreach($transaksi->detail as $det)
                    <tr> 
                         <td> {{$det->product->name}} </td>
                         <td> {{$det->product->type}} </td>
                         <td> {{$det->product->price}} </td>
                    </tr>
                    @endforeach  
               </table>
          </td>
     </tr>
</table>

<!-- 
<div class="row">
     <div class="col-sm-4"> 
     <a href="" class="btn btn-success btn-block"> 
     <i class="fa fa-check"> </i>Set Sukses</a>
     </div>
</div>   -->











