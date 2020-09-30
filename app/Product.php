<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table= 'products';

    protected $fillable = ['name', 'slug', 'type', 'description', 'qty'];

    protected $hidden = [];

    public function galeri()
    {
    	return $this->hasMany(GaleriProduct::class, 'products_id');
    	// Satu produk boleh banyak gambar
    }


}
