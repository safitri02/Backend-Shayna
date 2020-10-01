<?php

namespace App\Http\Controllers\API;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
            $product = Product::with('galeri')->find($id);

            if($peoduct)
            return ResponseFormatter::success($product, 'Data produk berhasil di ambil');
            else{
                return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
            }

        if($slug)
            $product = Product::with('galeri')->where('slug', $slug)->first();

            if($peoduct)
            return ResponseFormatter::success($product, 'Data produk berhasil di ambil');
            else{
                return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
            }

        $product = Product::with('galeri');

        if($name)
            $product->where('name', 'like', '%'. $name . '%');

        if($type)
            $product->where('type', 'like', '%'. $type . '%');

        if($price_from)
            $product->where('price', '=>', $price_from);

        if($price_to)
            $product->where('price', '<=', $price_to);

        return ResponseFormatter::success(
            $product->paginate($limit),
            'data list product berhasil di ambil'
        );
    }
}









