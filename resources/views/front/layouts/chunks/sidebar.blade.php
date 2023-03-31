<div class="row g-4">
    <div class="col-12">
      <h3 class="fw-bold">Категории</h3>

      <ul class="list-group list-group-flush">
        @if ($categories->count())
            @foreach ($categories as $category)
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ (request()->is('blog/category/'.$category->slug)) ? 'active' : '' }}"><a href="{{ route('blog.category', ['slug' => $category->slug]) }}" class="no-underline">{{ $category->title }}</a><span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span></li>
            @endforeach
        @endif
      </ul>
    </div>

    <div class="col-12">
      <h3 class="fw-bold">Теги</h3>
      @if ($tags->count())
        @foreach ($tags as $tag)
            <a href="{{ route('blog.tag', ['slug' => $tag->slug]) }}" class="no-underline"><span class="badge text-bg-light">{{ $tag->title }}</span></a>
        @endforeach
      @endif
    </div>

    <div class="col-12">
        <form action="" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="search" class="form-control" placeholder="Поиск..." aria-label="Поиск по блогу" aria-describedby="buttonSearch" id="site-search" name="q">
                <button class="btn btn-outline-secondary" type="submit" id="buttonSearch">Искать</button>
              </div>
        </form>
    </div>
</div>
