<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStatistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'date',
        'click',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
