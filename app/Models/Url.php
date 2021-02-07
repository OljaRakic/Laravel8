<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Url extends Model
{
    use HasFactory;
    protected $fillable =['base_url'];
    protected $table = "urls";

    public function store()
    {
        return $this->belongsToMany(Store::class);
    }
}
