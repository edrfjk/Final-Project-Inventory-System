<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    protected $fillable = ['product_id','quantity','date','remarks'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
