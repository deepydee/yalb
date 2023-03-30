@extends('front.layouts.layout')

@section('title', 'Блог компании')

@section('content')
    <section class="container">
      <header>
        <h1 class="display-5 fw-bold mb-5">Блог</h1>
      </header>
      <p class="mb-5">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Имеет он ведущими путь продолжил, собрал жизни домах приставка над проектах возвращайся своего текстов даже! Послушавшись даже злых заманивший. Вопроса.</p>
      <div class="row mb-5">
        <div class="col-md-9 mb-5">
          <div class="row g-4">

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
                  <div class="mt-1"><time datetime="2022-03-03" class="form-text text-muted" itemprop="datePublished" content="2015-02-05T08:00:00+08:00">{{ $post->created_at }}</time> <small>(обновлено <time datetime="2022-03-03" class="form-text text-muted" itemprop="dateModified" content="2015-02-05T08:00:00+08:00">{{ $post->updated_at }}</time>)</small></div>
                </footer>
              </article>
            </div>
            @endforeach

          </div>
        </div>

        <aside class="col-md-3 text-start mb-4 categories-list">
            @include('front.layouts.chunks.sidebar')
        </aside>

        {{ $posts->links('vendor.pagination.bootstrap-5') }}
      </div>
    </section>
@endsection
