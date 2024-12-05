<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'catalogue_name',
        'size',
        'catalogue_banner',
        'catalogue_url'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function catalogueStatistics()
    {
        return $this->hasMany(CatalogueStatistics::class);
    }
}
