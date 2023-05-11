@extends('front.layouts.layout')
@section('content')

@if ($category)
<section class="container mt-5">
    @include('front.layouts.chunks.breadcrumbs', ['category' => $category])
    <div class="row mb-4">
        <header>
            <h1 class="display-5 fw-bold">{{ $category->title }}</h1>
        </header>
    </div>

@if ($category->descendants)
<div class="row g-2 g-sm-4 mb-4">
   @foreach ($category->descendants as $subcategory)
   <div class="col-sm-6 col-lg-3">
        <div class="good-card rounded">
            <img src="{{ $subcategory->getFirstMediaUrl('images', 'thumb') }}" alt="{{ $subcategory->title }}">
            <div class="overlay overlay-1">
                <a href="{{ route('category.show', ['path' => $subcategory->path]) }}"><h3>{{ $subcategory->title }}</h3></a>
            </div>
        </div>
    </div>
   @endforeach
</div>
@endif

<div class="row g-2 g-sm-4 mb-4">
    @foreach($products as $product)
    <div class="col-sm-6 col-lg-3">
        <div class="good-card rounded">
        <img src="{{ $product->getFirstMediaUrl('images', 'thumb') }}" alt="Изготовление РВД и шлангов">
        <div class="overlay overlay-1">
            <a href="{{ route('products.show', ['category_path' => $category->path, 'product' => $product]) }}"><h3>{{ $product->title }}</h3></a>
        </div>
        </div>
    </div>
    @endforeach
</div>
@endif

<div class="row mb-4">
    <div class="col-12 ck-content">
        {!! $category->description !!}
    </div>
</div>

@endsection
