<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Products;


class Controller extends BaseController
{
    public function index(){

        $products = Products::all();

        return view('products.index',compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function storeProduct(){

        $products = new Device();

        $products->name = request('name');
        $products->description = request('description');

        $products->save();

        return redirect('/products');

    }
}
