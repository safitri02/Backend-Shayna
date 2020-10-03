<?php

namespace App\Http\Controllers;
use App\Transaksi;
use App\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('pages.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('detail.product')->findOrFail($id);

        return view('pages.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $transaksi = Transaksi::findOrFail($id);
        return view('pages.transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        // return $request;
        $transaksi = DB::table('transactions')->where('id', $id)->update([
            'name' => $req->name,
            'number' => $req->number,
            'address' => $req->address,
            'transaction_total' => $req->transaction_total
            // 'transaction_status' => $req->transaction_status
        ]);

        // echo"Ok";

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $id = Transaksi::findorFail($id);
        $id->delete();

        return redirect('/transaksi');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $status = Transaksi::findorFail($id);
        $status->transaction_status = $request->status;

        $status->save();
        
        return redirect('/transaksi');

    }
}
