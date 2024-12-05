<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogueStatistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalogue_id',
        'date',
        'impression',
        'click',
        'ctr',
    ];

    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }
}
