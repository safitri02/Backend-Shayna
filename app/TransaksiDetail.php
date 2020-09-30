<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiDetail extends Model
{
    use SoftDeletes;

    protected $table = 'transactions_details';

    protected $fillable = ['transactions_id', 'products_id'];

    protected $hidden = [];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transactions_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id ', 'id');
    }

}
