<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Products extends Model
{
    use HasFactory;
    protected $fillable =['name','sku','description','price'];
    protected $table = "products";

    public function store()
    {
        return $this->belongsToMany(Store::class);
    }
}

