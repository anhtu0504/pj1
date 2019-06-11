@extends('master')
@section('content')
<h1>Chi tiet san pham</h1>
@foreach($product as $new)
<h2>{{$new->name}}</h2>
<div class="single-item-header">
<a href="#"><img src="source/image/product/{{$new->image}}" alt=""></a>
</div>
@endforeach
@endsection