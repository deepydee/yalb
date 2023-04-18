@extends('front.layouts.layout')

@section('title', $post->title)

@section('content')
<article itemscope itemtype="http://schema.org/Article">
    <header class="mb-5">
      <div class="container-fluid blog-post-header-image p-0 mb-4">
        <img src="{{ $post->getImage() }}" alt="{{ $post->title }}" class="img-fluid" itemprop="image">
      </div>
      <div class="container">
        <h1 class="display-5 fw-bold mb-5" itemprop="headline">{{ $post->title }}</h1>
        <div class="mb-3"><span class="article-published fw-bold">Опубликовано </span><time datetime="{{ $post->created_at }}" class="form-text text-muted" itemprop="datePublished" content="{{ $post->created_at }}">{{ $post->getHumanReadableCreatedAt() }}</time><div><span class="article-updated fw-bold">Обновлено </span><time datetime="{{ $post->updated_at }}" class="form-text text-muted" itemprop="dateModified" content="{{ $post->updated_at }}">{{ $post->getHumanReadableUpdatedAt() }}</time></div> <div class="article-views text-muted">{{ $post->views }}</div></div>
      </div>
    </header>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Блог</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.category', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="container blog-post-text">
      <div class="row g-4 justify-content-around">
        <div class="col-12 col-lg-6">
            <p>{!! $post->description !!}</p>
            {!! $post->content !!}
          <div class="tags mb-4">
            @if ($post->tags->count())
                @foreach ($post->tags as $tag)
                    <a href="{{ route('blog.tag', ['slug' => $tag->slug]) }}" class="no-underline"><span class="badge text-bg-light">{{ $tag->title }}</span></a>
                @endforeach
            @endif
          </div>
        </div>
        <div class="col-lg-3 text-center">
          <div class="row g-4">
            <div class="col-12">
              <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                <a itemprop="url" href="https://example.com/profile/johndoe123" class="no-underline" target="_blank">
                  <img src="https://source.unsplash.com/200x200/?businessman" class="rounded-circle img-responsive me-2 mb-3 post-image">
                  <h3 class="fw-bold" itemprop="author">Александр Александров</h3>
                  <span class="text-muted">Кандидат технических наук, член наблюдательного совета ООН</span>
                </a>
              </span>
            </div>
            <aside class="col-12 text-start mb-4 categories-list">
                @include('front.layouts.chunks.sidebar')
                @include('front.layouts.chunks.featured')
            </aside>
          </div>
        </div>
      </div>
    </div>
    @include('front.layouts.chunks.comments-block', ['post' => $post])
  </article>
@endsection

@section('aside')
  @include('front.layouts.chunks.popular-posts')
@endsection
