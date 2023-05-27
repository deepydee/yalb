@extends('front.layouts.layout')

@section('title', 'Блог компании')

@section('content')
    <section class="container">
      <header>
        <h1 class="display-5 fw-bold mb-5">Блог</h1>
      </header>
      <p class="mb-5"></p>
      <div class="row mb-5">
        <div class="col-md-9 mb-5">
          <div class="row g-4">

            @foreach ($posts as $post)
            <div class="col-md-6">
                @include('front.layouts.chunks.post-card', ['post' => $post])
            </div>
            @endforeach

          </div>
        </div>

        <aside class="col-md-3 text-start mb-4 categories-list">
            @include('front.layouts.chunks.sidebar')
            @include('front.layouts.chunks.featured')
        </aside>

        {{ $posts->links('vendor.pagination.bootstrap-5') }}
      </div>
    </section>
@endsection
