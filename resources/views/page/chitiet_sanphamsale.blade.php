@extends('master')
@section('content')
<h1>Chi tiet san pham</h1>
@foreach($product as $spkm)
<h2>{{$spkm->name}}</h2>
<div class="single-item-header" >
<a href="#"><img src="source/image/product/{{$spkm->image}}" alt=""></a>
</div>
@endforeach
@endsection