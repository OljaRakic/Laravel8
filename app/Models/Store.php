<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Url;

class Store extends Model
{
    use HasFactory;
    protected $fillable =['name','base_url','description','code'];
    protected $table = "stores";

    public function url()
    {
        return $this->belongsToMany(Url::class);
    }
}

