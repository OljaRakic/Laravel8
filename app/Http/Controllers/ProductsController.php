<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Store;
use App\Models\Url;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreRequest;
use DB;


class ProductsController extends Controller
{
    public function index(){

        $products = Products::all();

        return view('products.index',compact('products'));
    }

    public function create(){
        return view('products.create');
    }


    public function store(ProductsStoreRequest $request)
    {
        // Will return only validated data
        $input = $request->all();
        $user = Products::create($input);

        $inputs = $request->all();
        $user = Store::create($inputs);
        
        $validated = $request->validated();
    }
    public function storeProduct(){

        $products = new Products();

        $products->name = request('name');
        $products->name = request('sku');
        $products->description = request('description');
        $products->description = request('price');
        $products->save();

        return redirect('/products');

    }

    public function showProduct ()
    {
        $data= Products :: all();
      
        return view('products', ['lists' => $data]);
    }

    public function showStore ()
    {
        $data= Store :: all();
        return view('products', ['lists' => $data]);
    }

    public function showUrl ()
    {
        $data= Url :: all();
        return view('urls', ['lists' => $data]);
    }

    public function addProduct()
    {
        return view('add_product');
    }

    public function saveProduct(Request $request)
    {

        $data=request()->validate([
            'name' => 'required',
            'sku'  => 'required',
            'description' => 'required',
            'price'  => 'required',
            'base_url' => 'required',
            'code' => 'required'
        ]);
        DB::table('products')->insert([
            'name'=>$request->name,
            'sku'=>$request->sku,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        DB::table('stores')->insert([
            'name'=>$request->name,
            'base_url'=>$request->base_url,
            'description'=>$request->description,
            'code'=>$request->code
        ]);

        //DB::table('urls')->insert([
        //    'base_url'=>$request->base_url
        //]);

        return back()-> with('product_add','Product added successfuly');
    }

    public function editProduct( $id)
    {
       $product= DB::table('products')->where('id',$id)->first();
       return view('edit_product',compact ('product'));
    }

    public function editStore( $id)
    {
        $store= DB::table('stores')->where('id',$id)->first();
        return view('stores',compact ('store'));
    }

    public function updateProduct( Request $request)
    {
        DB::table('products')->where('id',$request->id)->update([
            'name'=>$request->name,
            'sku'=>$request->sku,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        DB::table('stores')->where('id',$request->id)->update([
            'name'=>$request->name,
            'base_url'=>$request->base_url,
            'description'=>$request->description,
            'code'=>$request->code
        ]);
        return back()-> with('product_update','Product updated successfuly');
    }
   
    public function deleteProduct( $id)
    {
        DB::table('products')->where('id',$id)->delete();
        DB::table('stores')->where('id',$id)->delete();
        DB::table('urls')->where('id',$id)->delete();
        return back()-> with('product_delete','Product deleted successfuly');
    }

 
}
