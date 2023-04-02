<h3 class="mb-4 fw-bold">Читайте также</h3>
<div class="row">
    @if ($popularPosts->count())
        @foreach ($popularPosts as $post)
        <div class="col-md-6 col-lg-3">
            @include('front.layouts.chunks.post-card', ['post' => $post])
        </div>
        @endforeach
    @endif
</div>
