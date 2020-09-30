<?php

namespace App\Http\Controllers;
use App\Product;
use App\GaleriProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\ProductRequest;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        // return $request
        return view('pages.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // return $req;
        $req->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        $product = new Product;
        $product->name = $req->name;
        $product->slug = Str::slug($req->name);
        $product->type = $req->type;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->qty = $req->qty;
        $product->save();
        // echo "Ok";
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $product= Product::findOrFail($id);

        return view('pages.product.edit', compact('product'));
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
        // die;
        $req->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'qty' => 'required|integer',
        ]);

       $produk = DB::table('products')->where('id',$id)->update([
           'name' => $req->name,
           'slug' => Str::slug($req->name),
           'type' => $req->type,
           'description' => $req->description,
           'price' => $req->price,
           'qty' => $req->qty
       ]);
        // echo "Ok";
        return redirect('/product');
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
        $product = Product::findOrFail($id);
        $product->delete();

        GaleriProduct::where('products_id', $id)->delete();

        return redirect('/product');
    }

    public function galeri(Request $req, $id)
    {
        $product = Product::findOrFail($id);
        $item = GaleriProduct::with('product')
        ->where('products_id', $id)->get();

        return view('pages.product.galeri', compact('product', 'item'));

    }
}




