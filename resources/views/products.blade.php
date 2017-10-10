
@extends('layouts.app')

@section('content')

@php ($productos = [])
@foreach ($products as $key => $product)
@php (array_push($productos,$product))
@endforeach

@php ($productos[0]['csrf'] = csrf_token())

@php ($productos = json_encode($productos))


<div  id="filter">
    <textarea id="brands" style="display:none;">{{$productos}}</textarea>
</div>



<div class="container">
<div class="title m-b-md">
<h3>Products</h3>
</div>




<div  id="example">

<textarea id="data" style="display:none;">{{$productos}}</textarea>

</div>

{{ $products->links() }}
</div>
@endsection
