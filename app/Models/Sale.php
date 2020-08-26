<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends BaseModel
{
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'product_id',
        'date_sale',
        'sale',
        'quantity',
        'discount',
        'status'
    ];

    protected $filters = ['name','email','date_sale'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
