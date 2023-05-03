@extends('front.layouts.layout')
@section('content')

    <div class="product-list">
        @foreach($products as $product)
            <div class="product-list__card">
                <h1><a href="{{ route('products.show', $product) }}">{{ $product->title }}</a></h1>

                <h2>Характеристики:</h2>

                <ul>
                    @foreach($product->attributes as $attribute)
                        <li>{{ $attribute->title }}: {!! $attribute->pivot->value !!}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

@endsection
