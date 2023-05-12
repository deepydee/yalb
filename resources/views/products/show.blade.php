@extends('front.layouts.layout')
@section('content')

<div class="product-card">
    <h1>{{ $product->title }}</h1>

    <h2>Характеристики:</h2>
    <img src="{{ $product->getFirstMediaUrl('images', 'thumb') }}" alt="{{ $product->title }}">
    <table class="table-responsive-sm table-bordered table-hover">
        <caption>Характеристики для {{ $product->title }}</caption>
        <thead class="thead-dark">
            <tr>
            @foreach($product->attributes as $attribute)
            <th scope="col">{{ $attribute->title }}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
            <tr scope="row">
            @foreach($product->attributes as $attribute)
            @if ($attribute->type === App\Enums\AttributeType::Text)
                <td>{!! $attribute->pivot->value !!}</td>
            @endif
            @if ($attribute->type === App\Enums\AttributeType::Image)
            <td><img src="{{ $attribute->pivot->value }}"></td>
            @endif
            @endforeach
            </tr>
        </tbody>
    </table>
</div>

@endsection
