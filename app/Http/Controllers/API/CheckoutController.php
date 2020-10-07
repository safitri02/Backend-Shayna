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
        $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999);

        $transaction = TransaksiDetail::create($data);

        foreach ($request->transaction_details as $product)
        {
            $detail[] = new TransaksiDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);

            Product::find($product)->decrement('quantity');
        }

        $transaction->detail()->saveMany($details);

        return ResponseFormatter::success($transaction);

    }
}
