</<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
@if(Session::has('product_update'))
<span>{{Session::get('product_update')}}</span>
@endif


<form method="post" action="{{route('save.product')}}">
@csrf


<H1>Buy product</H1>

<label>Name</label><br>
<input name="name" value="{{$store->name}}"><br>
<label>Url</label><br>
<input name="base_url" value="{{$store->base_url}}"><br>
<label>Description</label><br>
<input name="description" value="{{$store->description}}"><br>
<label>Code</label><br>
<input name="code" value="{{$store->code}}"><br><br>

<a href="http://localhost:8000/products"> BUY PRODUCT</a>

</form>
</body>
</html>