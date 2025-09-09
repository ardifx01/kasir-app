<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'stock',
    ];

    // Tambahkan relasi ke SaleItem
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}