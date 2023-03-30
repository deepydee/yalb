<div class="row g-4">
    <div class="col-12">
      <h3 class="fw-bold">Категории</h3>

      <ul class="list-group list-group-flush">
        @foreach ($categories as $category)
        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ (request()->is('blog/category/'.$category->slug)) ? 'active' : '' }}"><a href="{{ route('blog.category', ['slug' => $category->slug]) }}" class="no-underline">{{ $category->title }}</a><span class="badge bg-primary rounded-pill">{{ $category->posts->count() }}</span></li>
        @endforeach

        {{-- <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" aria-current="true"><a href="" class="no-underline">Технологии</a><span class="badge bg-primary rounded-pill">2</span></li> --}}
      </ul>
    </div>
    <div class="col-12">
      <h3 class="fw-bold">Теги</h3>

      @foreach ($tags as $tag)
      <a href="#!" class="no-underline"><span class="badge text-bg-light">{{ $tag->title }}</span></a>
      @endforeach

    </div>
</div>
