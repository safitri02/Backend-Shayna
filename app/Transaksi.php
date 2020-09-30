<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = ['uuid', 'name', 'email', 'number', 'address', '$transaction_total', 'transaction_status'];

    protected $hidden = [];

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class, 'transactions_id');
    }


}
