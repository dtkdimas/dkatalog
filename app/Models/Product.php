<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'thumbnail',
        'product_url',
        'original_price',
        'discounted_price',
        'catalogue_id',
    ];

    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }

    public function productStatistics()
    {
        return $this->hasMany(ProductStatistics::class);
    }
}
