@extends('layouts.app')

@section('title')
    Products
@endsection

@section('content')
<h1>Products</h1>
    @foreach($products->chunk(5) as $productChunk)
     <div class="row">
        @foreach($productChunk as $product)
            <div class="col">
                <div class="thumbnail">
                    <img src="" style="max-width: 200px" alt="...">
                        <div class="caption">
                            <h3>{{ $product->name }}</h3>
                                <p class="description"> 
                                    {{ $product->description }}
                                </p>

                                <div class="clearfix">
                                    <div class="pull-left price">€{{ $product->price }}</div>
                                    <a href="{{ route('products.addToCart', ['id' => $product->id]) }}" class="btn btn-primary">Voeg Toe</a>
                                </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach       
@endsection
