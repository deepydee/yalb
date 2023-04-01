
@if ($featuredPosts->count())
<div class="col-12">
    <h3 class="fw-bold">Рекомендуем</h3>

    <div class="row">
        @foreach ($featuredPosts as $post)
        <div class="col-12 mb-3">
            <article class="card blog-card" itemscope itemtype="http://schema.org/Article">
              <a href="{{ route('blog.page', ['slug' => $post->slug]) }}"><img class="card-img-top" src="{{ $post->getImage() }}" alt="{{ $post->title }}" itemprop="image"></a>
              <div class="card-body">
                <header>
                  <h5 class="text-uppercase fs-6 fw-bold mb-4"><a href="{{ route('blog.category', ['slug' => $post->category->slug]) }}" class="blog-categoy">{{ $post->category->title }}</a></h5>
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
    </div>
</div>
@endif
