@extends('master')
@section('content')
<h1>Chi tiet san pham</h1>
@foreach($product as $sp)
<h2>{{$sp->name}}</h2>
<div class=" single-item-header">
<a href="#"><img src="source/image/product/{{$sp->image}}" alt=""></a>
</div>
@endforeach
@endsection