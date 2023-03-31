@extends('front.layouts.layout')

@section('title', 'Результаты поиска по блогу')

@section('content')
    <section class="container">
      <header mt-5>
        <h1 class="display-5 fw-bold mb-5">Результаты поиска по запросу "{{ $q }}"</h1>
      </header>

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Блог</a></li>
        <li class="breadcrumb-item active" aria-current="page">Поиск по блогу</li>
    </ol>
    </nav>

      <div class="row mb-5">
        <div class="col-md-9 mb-5">
          <div class="row g-4">
            @if ($posts->count())
                @foreach ($posts as $post)
                <div class="col-md-6">
                <article class="card blog-card" itemscope itemtype="http://schema.org/Article">
                    <a href="{{ route('blog.page', ['slug' => $post->slug]) }}"><img class="card-img-top" src="{{ asset($post->getImage()) }}" alt="{{ $post->title }}" itemprop="image"></a>
                    <div class="card-body">
                    <header>
                        <a href="{{ route('blog.category', ['slug' => $post->category->slug]) }}" class="no-underline">
                            <h5 class="text-uppercase fs-6 fw-bold mb-4">{{ $post->category->title }}</h5>
                        </a>
                    </header>
                    <h4 class="card-title fw-bold mb-3"><a href="{{ route('blog.page', ['slug' => $post->slug]) }}" class="blog-post" itemprop="headline">{{ $post->title }}</a></h4>
                    <p class="card-description">{!! $post->description !!}</p>
                    </div>

                    <footer class="card-footer">
                    <span  itemprop="author" itemscope itemtype="https://schema.org/Person"><a itemprop="url" href="https://example.com/profile/johndoe123"><img src="https://source.unsplash.com/25x25/?businessman" class="rounded-circle img-responsive img-fluid me-2">
                    <span class="card-text">Алексей Алексеев</span></a></span>
                    <div class="mt-1"><time datetime="{{ $post->created_at }}" class="form-text text-muted" itemprop="datePublished" content="{{ $post->created_at }}">{{ $post->getHumanReadableCreatedAt() }}</time> <small>(обновлено <time datetime="{{ $post->updated_at }}" class="form-text text-muted" itemprop="dateModified" content="{{ $post->updated_at }}">{{ $post->getHumanReadableUpdatedAt() }}</time>)</small></div>
                    </footer>
                </article>
                </div>
                @endforeach
            @else
                <div class="row mt-4">По вашему запросу ничего не найдено...</div>
            @endif
          </div>
        </div>

        <aside class="col-md-3 text-start mb-4 categories-list">
            @include('front.layouts.chunks.sidebar')
        </aside>

        {{ $posts->appends(['q' => request()->q])->links('vendor.pagination.bootstrap-5') }}
      </div>
    </section>
@endsection
