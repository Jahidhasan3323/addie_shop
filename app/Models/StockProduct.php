<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    use HasFactory;
    protected $table='stock_product';
    Protected $guarded=[];
    public  function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public  function stock(){
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
