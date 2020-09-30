<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GaleriProduct extends Model
{
    use SoftDeletes;
    protected $table= 'galeries';

    protected $fillable = ['products_id', 'photo', 'is_default'];

    protected $hidden = [];

    public function product()
    {
    	return $this->belongsTo(Product::class, 'products_id', 'id');
    	// Satu produk hanya 1 gambar
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
