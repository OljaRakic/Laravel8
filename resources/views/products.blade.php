</<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
@if(Session::has('product_add'))
<span>{{Session::get('product_add')}}</span>
@endif

@if(Session::has('product_delete'))
<span>{{Session::get('product_delete')}}</span>
@endif
<form method="post" action="{{route('save.product')}}">
@csrf
<h1>All Information About Products</h1>

<table border = '1'>
<tr>
<td>ID</td>
<td>Name</td>
<td>SKU</td>
<td>Description</td>
<td>Price</td>
<td>Action</td>

</tr>
@foreach ($lists as $list)

<tr>
<td>{{$list['id']}}</td>
<td>{{$list['name']}}</td>
<td>{{$list['sku']}}</td>
<td>{{$list['description']}}</td>
<td>{{$list['price']}}</td>
<td>
<a href="/edit_product/{{$list['id']}}">Edit</a>|
<a href="/delete_product/{{$list['id']}}">Remove</a>
</tr>
@endforeach
</table>


<H1>Add product</H1>

<label>Name</label><br>
<input name="name"><br>
@error('name'){{$message}} @enderror
<br>
<label>SKU</label><br>
<input name="sku"><br>
@error('sku'){{$message}} @enderror
<br>
<label>Description</label><br>
<input name="description"><br>
@error('description'){{$message}} @enderror
<br>
<label>Price</label><br>
<input name="price"><br>
@error('price'){{$message}} @enderror
<br>
<label>Url</label><br>
<input name="base_url">
<a href="https://www.google.com/" target="_blank">Browser</a><br>
@error('base_url'){{$message}} @enderror
<br>
<label>Code</label><br>
<input name="code"><br>
@error('code'){{$message}} @enderror
<br>
<input type="submit" value="Submit">
</form>
</body>
</html>