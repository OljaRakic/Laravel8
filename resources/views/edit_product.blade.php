</<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
@if(Session::has('product_update'))
<span>{{Session::get('product_update')}}</span>
@endif


<form method="post" action="{{route('update.product')}}">
@csrf


<H1>Edit product</H1>

<label>Name</label><br>
<input name="name" value="{{$product->name}}"><br>
<label>SKU</label><br>
<input name="sku" value="{{$product->sku}}"><br>
<label>Description</label><br>
<input name="description" value="{{$product->description}}"><br>
<label>Price</label><br>
<input name="price" value="{{$product->price}}"><br><br>

<a href="http://localhost:8000/products"> Save</a>


</form>
</body>
</html>