<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaksi::with(['detail.product'])->find($id);

        if($product)
            return ResponseFormatter::success($product, 'Data transaksi berhasil di ambil');

        else{
            return ResponseFormatter::error($product, 'Data transaksi gagal di ambil', 404);
        }
    }
}
