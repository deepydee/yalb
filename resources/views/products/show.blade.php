@extends('front.layouts.layout')
@section('content')

<div class="product-card">
    <h1>{{ $product->title }}</h1>

    <h2>Характеристики:</h2>
    <table class="table-responsive-sm table-bordered table-hover">
        <caption>Характеристики для {{ $product->title }}</caption>
        <thead class="thead-dark">
            <tr>
            @foreach($attributes as $attribute)
            <th scope="col">{{ $attribute->title }}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
            <tr scope="row">
            @foreach($attributes as $attribute)
            <td>{!! $attribute->pivot->value !!}</td>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>

@endsection
