@extends('front.layouts.layout')
@section('content')

@if ($category)
<section class="container mt-5">
    @include('front.layouts.chunks.breadcrumbs', ['category' => $category])
    <div class="row mb-5">
        <header>
            <h1 class="display-5 fw-bold mb-5">{{ $category->title }}</h1>
        </header>
        <p>{!! $category->description !!}</p>
    </div>

<div class="row g-2 g-sm-4">
    <div class="col-sm-6 col-lg-3">
        <div class="good-card rounded">
        <img src="{{ asset('assets/front/img/repair/001-265x265.jpg') }}" alt="Изготовление РВД и шлангов">
        <div class="overlay overlay-1">
            <a href="#"><h3>Изготовление РВД и шлангов</h3></a>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="good-card rounded">
        <img src="{{ asset('assets/front/img/repair/002-265x265.png') }}" alt="Ремонт гидроцилиндров и пневмоцилиндров">
        <div class="overlay overlay-1">
            <a href="#"><h3>Ремонт гидроцилиндров и пневмоцилиндров</h3></a>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="good-card rounded">
        <img src="{{ asset('assets/front/img/repair/003-265x265.png') }}" alt="Ремонт и производство маслостанций">
        <div class="overlay overlay-1">
            <a href="#"><h3>Ремонт и производство маслостанций</h3></a>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="good-card rounded">
        <img src="{{ asset('assets/front/img/repair/004-265x265.png') }}" alt="Ремонт гидронасосов и моторов">
        <div class="overlay overlay-1">
            <a href="#"><h3>Ремонт гидронасосов и моторов</h3></a>
        </div>
        </div>
    </div>
</div>
@endif

    {{-- <div class="product-list">
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
    </div> --}}

@endsection
