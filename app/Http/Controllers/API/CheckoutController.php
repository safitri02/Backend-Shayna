<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Transaksi;
use App\TransaksiDetail;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'RTX' . mt_rand(10000,99999) . mt_rand(100,999);
        
        $transaksi = Transaksi::create($data);

        foreach($request->transaction_details as $product)
        {
            $details[] = new TransaksiDetail([
                'transactions_id' => $transaksi->id,
                'products_id' => $product,
            ]);

            Product::find($product)->decrement('quantity');
            //Untuk mengurangi qty
        }

        $transaksi->detail()->saveMany($details);

        return ResponseFormatter::success($transaksi);

    }
}
